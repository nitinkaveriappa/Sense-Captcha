# Sense-Captcha

#### A UI friendly Captcha implementation for forms security.
Sense-Captcha is a free service that protects your website from spam and abuse.

------------------------------
### `Adding Sense-Captcha to your site`

**Client-Side**

Paste this snippet before the closing `</head>` tag on your HTML template:
```html
<script src="https://nitinkaveriappa.pro/SenseCaptcha/js/sense_3_0.js"></script>
```

**Server-Side**

When your users submit the form where you integrated Sense-Captcha, you'll get as part of the payload a string with the name "Sense-result". In order to check whether Sense-Captcha has verified that user, send a POST request with these parameters:

URL: https://nitinkaveriappa.pro/SenseCaptcha/result/$sense-result$

POST Parameter | Description
----|---------
$sense-result$ |	Required. The user response token provided by Sense-Captcha, verifying the user on your site.

#### Simple PHP Example

```php
if(isset($_POST['Sense-result']))
{
  $result = $_POST['Sense-result'];
}
else
{
  header("Location:index.php?type=bot");
}

$success=file_get_contents("https://nitinkaveriappa.pro/SenseCaptcha/result/$result");
if($success=="true")
{
  //All OK!!! Not a BOT!
}
else
{
  //Danger!!! It's a BOT!
}
```
