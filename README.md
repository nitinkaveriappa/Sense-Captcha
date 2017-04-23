# Sense-Captcha 
<img src="https://nitinkaveriappa.pro/SenseCaptcha/images/logo.svg" alt="Sense-Captcha Logo"  width="318" weight="67" />

#### A UI friendly Captcha implementation for forms security.
Sense-Captcha is a free service that protects your website from spam and abuse.

------------------------------
### `Audience`

This documentation is designed for people familiar with HTML forms and server-side processing. To use Sense-Captcha, you will probably need to edit some code.

We hope you find this documentation easy to follow.

------------------------------
### `Adding Sense-Captcha to your site`

**Client-Side**

The easiest method for using the Sense-Captcha widget on your webpage is to include the necessary JavaScript resource and a sense-captcha tag. The sense-captcha tag is a DIV element with class name 'sense-captcha':

```html
<html>
  <head>
    <title>Sense-Captcha demo: Simple page</title>
     <script src="https://nitinkaveriappa.pro/SenseCaptcha/js/sense_captcha.js"></script>
  </head>
  <body>
    <form action="?" method="POST">
      <!-- Form attributes -->
      <input type="submit" value="Submit">
      <div id="sense-captcha"></div>
    </form>
  </body>
</html>
```

Paste this snippet before the closing `</head>` tag on your HTML template:
```html
<script src="https://nitinkaveriappa.pro/SenseCaptcha/js/sense_captcha.js"></script>
```

Paste this snippet before the end of your `</form>` tag preferably after the buttons on your HTML template:
```html
<div id="sense-captcha"></div>
```

**Server-Side**

When your users submit the form where you integrated Sense-Captcha, you'll get as part of the payload a string with the name "Sense-result". In order to check whether Sense-Captcha has verified that user, send a request with these parameters:

URL: https://nitinkaveriappa.pro/SenseCaptcha/result/$sense-result$

Parameter | Description
----|---------
$sense-result$ |	Required. The user response token provided by Sense-Captcha, verifying the user on your site.

#### Simple PHP Example

```php
if(isset($_POST['Sense-result']))
{
  $sense-result = $_POST['Sense-result'];
}
else
{
  header("Location:index.php?type=bot");
}

$success=file_get_contents("https://nitinkaveriappa.pro/SenseCaptcha/result/$sense-result");
if($success=="true")
{
  //All OK!!! Not a BOT!
  //Do whatever...
}
else
{
  //Danger!!! It's a BOT!
  //Do whatever...
}
```
A sample implementation is provided in this repo which is available for use.
