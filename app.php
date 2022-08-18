<?php

if(isset($_REQUEST['debug'])) {
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
}
header("Access-Control-Allow-Origin: *");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

date_default_timezone_set("America/Los_Angeles");

use PandaDoc\Client\Api\DocumentsApi;
use PandaDoc\Client\ApiException;
use PandaDoc\Client\Configuration;
use PandaDoc\Client\Model\DocumentCreateRequest;
use PandaDoc\Client\Model\DocumentCreateRequestRecipients;
use PandaDoc\Client\Model\DocumentCreateResponse;
use PandaDoc\Client\Model\DocumentSendRequest;

require_once(__DIR__ . '/vendor/autoload.php');


if(isset($_REQUEST['emailAddress']) && $_REQUEST['emailAddress'] != '') {
	
	class CreateDocumentFromPdByUrlAndSend
	{
	//Replace "YOUR_API_KEY" with...well, you guessed it, your PandaDco API Key!
	const API_KEY = 'YOUR_API_KEY';

	//These lines assume you're working from the full sample app, including the directory structure and sample PDFs.
	//If not, change $whereAmI."/docs/loanForm.pdf" to the full URL of wherever your PDF is.
	$scheme = (!empty($_SERVER['HTTPS'])) ? "https://" : "http://";
	$whereAmI = $scheme . $_SERVER['HTTP_HOST'] . substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], "/"));	
	
	const PDF_URL = $whereAmI."/docs/loanForm.pdf";

	    const MAX_CHECK_RETRIES = 5;

	    /**
	     * @param DocumentsApi $documentApiInstance
	     * @return DocumentCreateResponse
	     * @throws ApiException
	     */
	    public static function createDocument(DocumentsApi $documentApiInstance): DocumentCreateResponse
	    {
			$monthDay = date("F j");
			$year = date("Y");
			$uid = uniqid('PandaDoc.',true); //this is not required - I just added it to show you can add an ID for these that's meaningful to you
			$output = array();
			
			$nameFirst = $_REQUEST['nameFirst'];
			$nameLast = $_REQUEST['nameLast'];
			$borrowerName = $nameFirst.' '.$nameLast;
			$emailAddress = $_REQUEST['emailAddress'];
			$streetAddress = $_REQUEST['streetAddress'];
			$loanAmount = $_REQUEST['loanAmount'];
			$dueDate = date('n/j/Y',strtotime(date("n/j/Y", mktime()) . " + 365 day"));
			$payDay = $_REQUEST['payDay'];
			$today = date('n/j/Y');
		
	        $documentCreateRequest = new DocumentCreateRequest();
	        $documentCreateRequest
	            ->setName('Sample Loan Application from PDF with Field Tags')
	            ->setUrl(self::PDF_URL)
	            ->setTags(['PandaDoc', 'is the coolest'])
	            ->setRecipients([
	                (new DocumentCreateRequestRecipients())
	                    ->setEmail($emailAddress)
	                    ->setFirstName($nameFirst)
	                    ->setLastName($nameLast)
	                    ->setRole('user')
	                    ->setSigningOrder(1)
	            ])
	            ->setFields([ //remember that these field names must match what's in the PDF exactly!
	                'monthDay' => ['value' => $monthDay],
	                'year' => ['value' => $year],
	                'borrowerName' => ['value' => $borrowerName],
	                'streetAddress' => ['value' => $streetAddress],
					'loanAmount' => ['value' => $loanAmount],
					'dueDate' => ['value' => $dueDate],
					'payDay' => ['value' => $payDay],
					'today' => ['value' => $today]
	            ])
	            ->setMetadata([
	                'applicationUUID' => $uid, //here's the UUID generated above, and...
	                'theKidInTheMaskSays' => 'Are you my mommy?' //you can add whatever other metadata you need. Extra points if you know where that quote is from :)
	            ])
	            ->setParseFormFields(true); //IMPORTANT - this tells the API to parse the form fields and fill them in on the PDF
					
	        return $documentApiInstance->createDocument($documentCreateRequest);
	    }

	    /**
	     * Document creation is non-blocking (asynchronous) operation.
	     *
	     * With a successful request, you receive a response with the created
	     * document's ID and status document.uploaded.
	     * After processing completes on our servers, usually a few seconds,
	     * the document moves to the document.draft status.
	     * Please wait for the webhook call or check this document's
	     * status before proceeding.
	     *
	     * The change of status from document.uploaded to another status signifies
	     * the document is ready for further processing.
	     * Attempting to use a newly created document before PandaDoc servers
	     * process it will result in a '404 document not found' response.
	     *
	     * @param DocumentsApi $documentApiInstance
	     * @param DocumentCreateResponse $document
	     * @return void
	     * @throws ApiException|Exception
	     */
	    public static function ensureDocumentCreated(DocumentsApi $documentApiInstance, DocumentCreateResponse $document): void
	    {
	        $currentRetries = 0;

	        while ($currentRetries < self::MAX_CHECK_RETRIES) {
	            try {
	                sleep(2);
	            } catch (Exception $e) {
	                print_r($e->getMessage() . PHP_EOL);
	                throw $e;
	            }

	            $currentRetries++;
	            $docStatusResponse = $documentApiInstance->statusDocument($document->getId());
	            if ($docStatusResponse->getStatus() === 'document.draft') {
	                return;
	            }
	        }

	        throw new Exception('Document was not sent');
	    }

	    /**
	     * @param DocumentsApi $documentApiInstance
	     * @param DocumentCreateResponse $document
	     * @return void
	     * @throws ApiException
	     */
	    public static function sendDocument(DocumentsApi $documentApiInstance, DocumentCreateResponse $document): void
	    {
	        $requestBody = (new DocumentSendRequest())
	            ->setSilent(False)
	            ->setSubject('This doc was sent via the PandaDoc PHP Sample Loan Application');

	        $documentApiInstance->sendDocument($document->getId(), $requestBody);
	    }

	    public static function run()
	    {
	        $config = Configuration::getDefaultConfiguration()
	            ->setApiKey('Authorization', self::API_KEY)
	            ->setApiKeyPrefix('Authorization', 'API-Key');

	        $documentApiInstance = new DocumentsApi(null, $config);

	        try {
	            $document = self::createDocument($documentApiInstance);

	            self::ensureDocumentCreated($documentApiInstance, $document);
	            self::sendDocument($documentApiInstance, $document);
				print_r($document.PHP_EOL);


	        } catch (Exception $e) { //in case of error, this outputs a verbose description of what happened. Once you've got it working well in your environment, you may wish to shorten the error message to something a bit more end-user friendly.
				$output['status'] = "Error status code: " . $e->getCode();
				$output['reason'] = $e->getMessage();
				$output['trace'] = $e->getTraceAsString();
				$out = json_encode($output);
				echo $out;
	        }
	    }
	}

	CreateDocumentFromPdByUrlAndSend::run();

} else {
	//Just in case this page is arrived at by accident.
	$output['status'] = "Who sent you here? Who do you work for? What's going on?";
	echo json_encode($output);
	die;
	
}
