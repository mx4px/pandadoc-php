# pandadoc-php
## Sample Loan Application - PHP

This is a simple application written in PHP to introduce you to several of PandaDoc's key features. It should allow you to get up and running quickly, with only a few modifications to suit your own needs.

### Setup
1. Just copy everything here, including the directory structure, to a directory on your website (doesn't have to be the root).
2. Then open app.php in your favorite text editor, and scroll down to where it says "const API_KEY = 'YOUR_API_KEY'"
3. Replace 'YOUR_API_KEY' with your PandaDoc API key (log in to [the PandaDoc Developer site](https://developers.pandadoc.com), go to the Developer Dashboard, Configuration panel, and you can generate a key there). Keep the quotes - so it looks something like `const API_KEY = 'ABCD1234EFG567';`
4. Assuming you haven't changed anything else, you're now ready to visit the index.php page on your website.

### Try it out
1. Visit the index.php page on your website. You should see a simple form with six fields on it.
2. Go ahead and fill that out. It doesn't really matter what you enter, as long as you don't leave anything empty.
3. You will, however, want to use a real email address that you have access to for the "Email Address" field. This is because the PandaDoc API will send a notification to this email address when your document is ready to view and sign. This will give you an idea what your client might see in the real world.
4. After you fill out and Submit the form, you will get a notification that your document has uploaded.
5. Shortly after that, you will receive an email at the address you entered, saying that a doc was sent via the PandaDoc PHP Sample Loan application.
6. Open that email, click the "OPEN THE DOCUMENT" button, and you will be taken to the filled-in document.
    * You will receive another email saying the document was viewed...
    * This particular sample has a spot for a signature - go ahead and click where it says "Signature" and you'll be able to sign it just as a client would, so you can see the whole workflow.
  
### Digging deeper
Here's a breakdown of what's going on:
1. The form on index.php is basically just a standard HTML form - nothing fancy. We've made it a little nicer by adding Bootstrap and some theme elements.
2. In lib/app.js:
    * We're using jQuery AJAX and validate functions to capture the output of the form, validate it, pass it along to app.php, and then display the results.
    * The interesting parts: we're validating in lines 4-23, submitting in lines 24-51, and reading back the results in lines 51-67
3. In app.php:
    * Lines 3-6 include a debugger, just in case.
    * Lines 7-12 force this page not to be cached...this makes things a lot easier when you're passing data around.
    * Line 14 defines our time zone for this session - this will be helpful later, and is considered good practice in general.
    * Lines 16-24 import all the classes & methods defined by the files in our **vendor** directory - basically telling our script how to interact with the PandaDoc API
    * Line 32 contains the API key, described above
    * Lines 36-37 begin the setup of the URL we'll pass along so the API can find the PDF we're using.
    * Line 39 finishes setting that URL up and puts it into a constant to be used later.
    * Lines 50-63 capture the data we passed in from the form (via $_REQUEST), and also creates some variables containing data (mostly date-based things) we'll use to fill in the PDF, but weren't passed along from the form.
    * Lines 72-76, in the "setRecipients" section, are very important for the API - you'll notice on the PDF that we've mentioned 'user' in several places. This section tells the API who that is, and also who to send emails to.
    * Lines 79-86, in the "setFields" section, attach the data we've collected so far to fields. It's very important that the field names here match the ones on the PDF!
    * Lines 89-90, in the "setMetadata" section, give you a place to add any additional info you need for your internal use.
    * Line 92 - "setParseFormFields" should be set to "true" so the API knows to parse the fields we're passing here, and fill in the PDF.
    * Lines 117-137 define the function that tells the API to verify that the new document was created.
    * Lines 145-152 define the function that tells the API to send the document via email.
    * Lines 154-177 define a function to pull all the rest of the functions together and run them.
    * Line 180 runs it all!
    * Lines 182-188 are just there so the page does something in case someone arrives at app.php here by mistake (i.e. without having filled out the form).
4. In the PDF:
    * Check out [this page](https://developers.pandadoc.com/reference/create-document-from-pdf) in the PandaDoc Developer Documentation to see how to set up [fields](https://developers.pandadoc.com/reference/create-document-from-pdf#pdf-form-fields) and [field tags](https://developers.pandadoc.com/reference/create-document-from-pdf#pdfdocxrtf-field-tags) on your own documents, so they can be used in this way.
