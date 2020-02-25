# instagram-feed
Embed Instagram profile feed from your instagram accounts on your website using PHP

## Requeriments
- PHP Hosting (with `fopen()` support) [[Guide]](#php-hosting)
- Font Awesome Kit [[Guide]](#font-awesome-kit)
- Facebook Developer App [[Guide]](#facebook-developer-app)
- Instagram Basic Display API [[Guide]](#instagram-basic-display-api)

## Requeriments Guide

- ### PHP Hosting
  I think you can use any PHP Hosting unless it doesn't support `fopen()`, I personally use [Namecheap Shared Hosting](https://www.namecheap.com/hosting/shared/).
1. Paste your site URL in at `{your-site-url}` for the `$site` variable at `config.php`.

- ### Font Awesome Kit
  Font Awesome is the most popular way to add font icons to your website [[1]](https://www.ostraining.com/blog/general/font-awesome/).
  To get your icon kit for free follow the next steps.
1. Click [here](https://fontawesome.com/start) and enter your email address.
[![Font Awesome Step 1](https://yizack.com/images/instagram-feed/font-awesome-1.jpg)](https://fontawesome.com/start)
2. Check your email to confirm and set up your account.
[![Font Awesome Step 2](https://yizack.com/images/instagram-feed/font-awesome-2.jpg)](https://fontawesome.com/start)
3. Setup your account.
[![Font Awesome Step 3](https://yizack.com/images/instagram-feed/font-awesome-3.jpg)](https://fontawesome.com/start)
4. When you have set up your account, your script will be displayed.
[![Font Awesome Step 4](https://yizack.com/images/instagram-feed/font-awesome-4.jpg)](https://fontawesome.com/start)
5. Paste your kit URL in at `{fontawesome-kit-url}` for the `$fontawesome` variable at `config.php`.

- ### Facebook Developer App
  In order to use the instagram API, we must first create a Facebook App. Follow the steps below to create a Facebook App.
1. Go to [Facebook for Developers site](https://developers.facebook.com/), login and click Create App.
[![Facebook App Step 1](https://yizack.com/images/instagram-feed/facebook-app-1.jpg)](https://developers.facebook.com/)
2. Create your App ID.
[![Facebook App Step 2](https://yizack.com/images/instagram-feed/facebook-app-2.jpg)](https://developers.facebook.com/)
3. In the products tab, add Instagram to use the Instagram API
[![Facebook App Step 3](https://yizack.com/images/instagram-feed/facebook-app-3.jpg)](https://developers.facebook.com/)
4. In the Instagram menu, click *Basic Display*, then click *Settings* to update your App settings.
[![Facebook App Step 4](https://yizack.com/images/instagram-feed/facebook-app-4.jpg)](https://developers.facebook.com/)
5. Fill these required fields.
    - Privacy Policy URL (Must be a valid url, even if not a privacy policy url)
    - App Icon
    - Business Use
    - Category
[![Facebook App Step 5](https://yizack.com/images/instagram-feed/facebook-app-5.jpg)](https://developers.facebook.com/)
6. Scroll down and click Add Platform button.
[![Facebook App Step 6](https://yizack.com/images/instagram-feed/facebook-app-6.jpg)](https://developers.facebook.com/)
7. Enter your site URL and save changes.
[![Facebook App Step 7](https://yizack.com/images/instagram-feed/facebook-app-7.jpg)](https://developers.facebook.com/)

- ### Instagram Basic Display API
  Now it's time to authorize your instagram account.
1. Back to Products > Instagram > Basic Display. Create new App.
[![Instagram App Step 1](https://yizack.com/images/instagram-feed/instagram-app-1.jpg)](https://developers.facebook.com/)
2. Fill OAuth Redirect, Deauthorize Callback and Data Deletion Request URL with your site URL and save changes.
[![Instagram App Step 2](https://yizack.com/images/instagram-feed/instagram-app-2.jpg)](https://developers.facebook.com/)
3. Add Instagram testers.
[![Instagram App Step 3](https://yizack.com/images/instagram-feed/instagram-app-3.jpg)](https://developers.facebook.com/)
4. Enter your Instagram username and selct it.
[![Instagram App Step 4](https://yizack.com/images/instagram-feed/instagram-app-4.jpg)](https://developers.facebook.com/)
5. Go to your Instagram account settings page > App and Websites > Tester invites, accept the invite.
[![Instagram App Step 5](https://yizack.com/images/instagram-feed/instagram-app-5.jpg)](https://developers.facebook.com/)
6. Back to Products > Instagram > Basic Displa > User Token Generator, you Instagram account should appear, then click Generate Token button for authorize and generate long-lived access token for instagram.
[![Instagram App Step 6](https://yizack.com/images/instagram-feed/instagram-app-6.jpg)](https://developers.facebook.com/)
7. Login and authorize the App.
[![Instagram App Step 7](https://yizack.com/images/instagram-feed/instagram-app-7.jpg)](https://developers.facebook.com/)
8. Copy the generated Token.
[![Instagram App Step 8](https://yizack.com/images/instagram-feed/instagram-app-8.jpg)](https://developers.facebook.com/)
9. Paste your token in at `{long-lived-access-token}` for the `$token` variable at `config.php`.