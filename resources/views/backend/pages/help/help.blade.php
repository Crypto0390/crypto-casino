<div class="accordion">
  <div class="card border-primary">
    <div class="card-header border-primary">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab-01" aria-expanded="true">
          {{ __('How to install an add-on?') }}
        </button>
      </h5>
    </div>
    <div id="tab-01" class="collapse">
      <div class="card-body text-body">
        <ul>
          <li>Open <b>Add-ons</b> page, find the purchased add-on in the list and click <b>Install</b> button.</li>
          <li>Input the purchase code and click <b>Proceed</b> button.</li>
        </ul>
        <p>
          The add-on will be automatically downloaded and installed.
        </p>
      </div>
    </div>
  </div>

  <div class="card border-primary">
    <div class="card-header border-primary">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab-02" aria-expanded="true">
          {{ __('How to upgrade the app to a new version?') }}
        </button>
      </h5>
    </div>
    <div id="tab-02" class="collapse">
      <div class="card-body text-body">
        <ul>
          <li>Back up the application files and database.</li>
          <li>Go to <b>Backend</b> » <b>Maintenance</b> page and click <b>Enable maintenance mode</b>.</li>
          <li>Download the latest application package from CodeCanyon, upload it to your server and unzip (overwrite all existing files).</li>
          <li>Go to <b>Backend</b> » <b>Maintenance</b> page and click <b>Run database updates</b> and then <b>Clear cache</b> button.</li>
          <li>Go to <b>Backend</b> » <b>Maintenance</b> and click <b>Disable maintenance mode</b>.</li>
          <li>Clear cache in your browser and refresh the page</li>
          <li>Check that the application and all games are working correctly.</li>
        </ul>
        <div class="alert alert-warning" role="alert">
          If you use any external cache services or CDN (e.g. Cloudflare) make sure to clear all caches there as well.
        </div>
      </div>
    </div>
  </div>

  <div class="card border-primary">
    <div class="card-header border-primary">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab-03" aria-expanded="true">
          {{ __('How to add a redirect from http to https?') }}
        </button>
      </h5>
    </div>
    <div id="tab-03" class="collapse">
      <div class="card-body text-body">
        <p>
          If you like to add an auto redirect from http:// to https:// uncomment the below 2 lines in <b>.htaccess</b> file
          (located in the web root folder):
        </p>
        <pre class="text-body">RewriteCond %{HTTPS} off
RewriteRule (.*) https://%{HTTP_HOST}%{REQUEST_URI} [R=301,L]
  </pre>
        <p>
          Please note that if the web root is set to <b>../public</b> folder, you need to edit <b>../public/.htaccess</b> file instead.
        </p>
      </div>
    </div>
  </div>

  <div class="card border-primary">
    <div class="card-header border-primary">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab-19" aria-expanded="true">
          {{ __('Is it possible to change the win rate in Slots?') }}
        </button>
      </h5>
    </div>
    <div id="tab-19" class="collapse">
      <div class="card-body text-body">
        <p>
          All games results are completely random, you can't manually set the win rate or otherwise affect the roll process.
          However, you can adjust the Slots game settings to make it more difficult for a user to win
          (or to be more precise - make it more difficult to have the positive net result,
          because winning 5 on a 20 credits bet is not actually a win). You can:
        <ul>
          <li>Increase the min bet size</li>
          <li>Decrease the payout amounts</li>
          <li>Disable scatter and / or wild symbols</li>
          <li>Increase the min number of symbols that can win (e.g. only 4 or 5 symbols on a line win)</li>
        </ul>
        </p>
      </div>
    </div>
  </div>

  <div class="card border-primary">
    <div class="card-header border-primary">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab-04" aria-expanded="true">
          {{ __('How to enable social login?') }}
        </button>
      </h5>
    </div>
    <div id="tab-04" class="collapse">
      <div class="card-body text-body">
        <p>
          To enable authentication (using OAuth) with one of the supported social providers (Facebook, Twitter, Google, LinkedIn, Yahoo, Coinbase, Steem) complete the following steps.
        </p>
        <ul>
          <li>Log in to a developers platform (for instance, Facebook for developers is located at
            <a href="https://developers.facebook.com/" target="_blank">developers.facebook.com</a>).
          </li>
          <li>Create a new web application and fill in necessary details (such as name, URL of your website etc).</li>
          <li>
            Specify <b>Callback URL</b> (can also be called <b>Redirect URL</b>) as
            <i>https://YOURWEBSITE.COM/login/PROVIDER/callback</i> (example: https://mycasino.com/login/facebook/callback). For your convenience Callback URLs for each provider are displayed under
            <b>Integration</b> tab on the <b>Settings</b> page.
          </li>
          <li>Obtain <b>Client ID</b> and <b>Client secret</b> (they can also be called <b>App ID</b> and <b>App secret</b>,
            <b>Consumer key</b> and <b>Consumer secret</b> and alike).
          </li>
          <li>Input <b>Client ID</b> and <b>Client secret</b> on the <b>Settings</b> page (<b>Integration</b> tab).</li>
        </ul>
        <p>Here is how the app settings page looks like on Facebook for developers:</p>
        <div class="my-3">
          <img src="/images/help/facebook-oauth.jpg" width="100%">
        </div>
        <p>Things to note:</p>
        <ul>
          <li>Social login will not work on localhost</li>
          <li>Your website should have an SSL certificate installed and enabled</li>
        </ul>
      </div>
    </div>
  </div>

  <div class="card border-primary">
    <div class="card-header border-primary">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab-05" aria-expanded="true">
          {{ __('How to enable chat?') }}
        </button>
      </h5>
    </div>
    <div id="tab-05" class="collapse">
      <div class="card-body text-body">
        <ul>
          <li>
            Sign up at
            <a href="https://pusher.com/" rel="nofollow" target="_blank">Pusher</a>, create a new
            <b>channels app</b> and obtain its credentials (app ID, key, secret and cluster).
          </li>
          <li>
            Go to <b>Backend</b> » <b>Settings</b> » <b>Integration</b> » <b>Pusher</b> and input the above credentials.
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="card border-primary">
    <div class="card-header border-primary">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab-06" aria-expanded="true">
          {{ __('How to add bots?') }}
        </button>
      </h5>
    </div>
    <div id="tab-06" class="collapse">
      <div class="card-body text-body">
        <ul>
          <li>
            Open <b>Backend</b> » <b>Maintenance</b> page, under <b>Tasks</b> select <b>Create bots</b>, choose the number of bots
            and click <b>Execute</b>.
          </li>
          <li>
            Go to <b>Backend</b> » <b>Settings</b> » <b>Bots</b> » <b>Games</b> and configure bots settings.
          </li>
        </ul>
        <div class="alert alert-warning" role="alert">
          Make sure that the cron job specified on <b>Backend</b> » <b>Maintenance</b> page is added to your server.
          Please check the installation guide for more info how to set up a cron job.
        </div>
      </div>
    </div>
  </div>

  <div class="card border-primary">
    <div class="card-header border-primary">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab-07" aria-expanded="true">
          {{ __('Bots do not play') }}
        </button>
      </h5>
    </div>
    <div id="tab-07" class="collapse">
      <div class="card-body text-body">
        <p>
          Make sure that the cron job specified on <b>Backend</b> » <b>Maintenance</b> page is added to your server.
          Please check the installation guide for more info how to set up a cron job.
        </p>
      </div>
    </div>
  </div>

  <div class="card border-primary">
    <div class="card-header border-primary">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab-08" aria-expanded="true">
          {{ __('How to add Google Analytics?') }}
        </button>
      </h5>
    </div>
    <div id="tab-08" class="collapse">
      <div class="card-body text-body">
        <ul>
          <li>Open <a href="https://tagmanager.google.com/" target="_blank">Google Tag Manager</a>,
            create a new <b>Account</b> and add a new <b>Container</b> to it.
          </li>
          <li>
            Follow <a href="https://support.google.com/tagmanager/answer/6107124?hl=en" target="_blank">this guide</a>
            to add a Google Analytics tag to the created container.
          </li>
          <li>
            Go to <b>Backend</b> » <b>Settings</b> » <b>Integration</b> » <b>Google Tag Manager</b>
            and input <b>GTM Container ID</b>.
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="card border-primary">
    <div class="card-header border-primary">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab-09" aria-expanded="true">
          {{ __('How to change the OG image?') }}
        </button>
      </h5>
    </div>
    <div id="tab-09" class="collapse">
      <div class="card-body text-body">
        <p>
          The OG image is used when sharing website content on social media.
          To override the default OG image create an image file named <b>og-image-udf.jpg</b>
          and put it to <b>public/images</b> folder.
          This way you will be able to keep your custom OG image during future updates.
        </p>
      </div>
    </div>
  </div>

  <div class="card border-primary">
    <div class="card-header border-primary">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab-10" aria-expanded="true">
          {{ __('How to change the favicon?') }}
        </button>
      </h5>
    </div>
    <div id="tab-10" class="collapse">
      <div class="card-body text-body">
        <p>
          The website favicon files are located in <b>public/images/favicon</b> folder.
          You can just overwrite the original files with your custom ones.
        </p>
      </div>
    </div>
  </div>

  <div class="card border-primary">
    <div class="card-header border-primary">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab-11" aria-expanded="true">
          {{ __('How to change translations?') }}
        </button>
      </h5>
    </div>
    <div id="tab-11" class="collapse">
      <div class="card-body text-body">
        <p>
          You can change translation strings for any language by editing JSON translation
          files in <b>resources/lang</b> folder.
        </p>
      </div>
    </div>
  </div>

  <div class="card border-primary">
    <div class="card-header border-primary">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab-12" aria-expanded="true">
          {{ __('How to change default text strings in English?') }}
        </button>
      </h5>
    </div>
    <div id="tab-12" class="collapse">
      <div class="card-body text-body">
        <p>
          To change the default text strings it's not necessary to modify the application code.
          All you need to do is to create a JSON translation file called <b>en.json</b> and put it in
          <b>resources/lang</b> folder. The file can be created as a copy from any other translation file,
          such as <b>resources/lang/de.json</b> for instance. In this translation file you need to keep only those
          text strings that you would like to override. The left side represents the original text string in English
          and the right side represents the overridden string. Example:
        </p>
        <pre class="text-body">{
    "Crypto Casino": "My custom casino name"
}</pre>
      </div>
    </div>
  </div>

  <div class="card border-primary">
    <div class="card-header border-primary">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab-13" aria-expanded="true">
          {{ __('How to add custom CSS rules?') }}
        </button>
      </h5>
    </div>
    <div id="tab-13" class="collapse">
      <div class="card-body text-body">
        <p>
          If you like to apply some custom CSS styles create a file called <b>style-udf.css</b> inside <b>public/css</b> folder
          and put your styles there. This will help you to preserve your custom styles after upgrading the app to a new version.
        </p>
      </div>
    </div>
  </div>

  <div class="card border-primary">
    <div class="card-header border-primary">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab-14" aria-expanded="true">
          {{ __('How to override header, footer and front page templates?') }}
        </button>
      </h5>
    </div>
    <div id="tab-14" class="collapse">
      <div class="card-body text-body">
        <p>
          Sometimes you might want to override default header, footer and front page templates. It's better
          than just changing the template files directly, because in this case you will not lose your customizations when
          upgrading the application.
        </p>
        <p>To override these templates create the following files and edit them the way you like:</p>
        <ul>
          <li><b>Header:</b> resources/views/frontend/includes/header-udf.blade.php</li>
          <li><b>Footer:</b> resources/views/frontend/includes/footer-udf.blade.php</li>
          <li><b>Front page:</b> resources/views/frontend/layouts/home-udf.blade.php</li>
        </ul>
      </div>
    </div>
  </div>

  <div class="card border-primary">
    <div class="card-header border-primary">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab-15" aria-expanded="true">
          {{ __('How to add a custom static text page?') }}
        </button>
      </h5>
    </div>
    <div id="tab-15" class="collapse">
      <div class="card-body text-body">
        <p>
          Suppose you want to add a new static text page, which is available at <a href="#">http://yourwebsite.com/page/my-text-page</a>.
          To do so create a new template file named <b>my-text-page.blade.php</b> in <b>resources/views/frontend/pages/static</b> folder.
          You can copy the default page structure from other static pages templates in this folder and then modify it as needed.
          After the template is created the static page will automatically become available.
        </p>
      </div>
    </div>
  </div>

  <div class="card border-primary">
    <div class="card-header border-primary">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab-16" aria-expanded="true">
          {{ __('How to disable the maintenance mode if I logged out from the admin account?') }}
        </button>
      </h5>
    </div>
    <div id="tab-01" class="collapse">
      <div class="card-body text-body">
        <p>
          To disable the maintenance mode when you don't have access to the backend delete the following file:
          <b>storage/framework/down</b>.
        </p>
      </div>
    </div>
  </div>

  <div class="card border-primary">
    <div class="card-header border-primary">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab-17" aria-expanded="true">
          {{ __('How to disable reCAPTCHA?') }}
        </button>
      </h5>
    </div>
    <div id="tab-17" class="collapse">
      <div class="card-body text-body">
        <p>
          If you do not have access to backend you can disable reCAPTCHA by
          editing .env configuration file (located in the web root folder) and removing the following variables:
        </p>
        <pre class="text-body">RECAPTCHA_PUBLIC_KEY
RECAPTCHA_SECRET_KEY
  </pre>
      </div>
    </div>
  </div>

  <div class="card border-primary">
    <div class="card-header border-primary">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab-18" aria-expanded="true">
          {{ __('Application settings are not saved') }}
        </button>
      </h5>
    </div>
    <div id="tab-18" class="collapse">
      <div class="card-body text-body">
        <p>
          Check that <b>putenv</b> and <b>getenv</b> PHP functions are not disabled
          (not added to <b>disable_functions</b> list in php.ini).
        </p>
        <p>
          Apart from that please make sure not to cache the application config file with <b>php artisan config:cache</b> command.
          If you did so please run <b>php artisan config:clear</b> command.
        </p>
      </div>
    </div>
  </div>

  <div class="card border-primary">
    <div class="card-header border-primary">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab-20" aria-expanded="true">
          {{ __('I get an SMTP error') }}
        </button>
      </h5>
    </div>
    <div id="tab-20" class="collapse">
      <div class="card-body text-body">
        <p>
          The following or similar exception is raised when sending an email:
        </p>
        <div class="alert alert-danger" role="alert">
          stream_socket_enable_crypto(): Peer certificate CN=`xxx.secureserver.net'
          did not match expected CN=`smtp.gmail.com'
        </div>
        <p>
          What it means is that your SMTP connection is being intercepted and redirected elsewhere,
          so the name no longer matches. This is TLS doing its job properly, preventing man in the middle attacks,
          and stopping your credentials being given away to an unknown third party.
          It usually happens when your hosting provider blocks any external 3rd party SMTP services (e.g. Gmail) and forces to use their own.
          So please check with your hosting support what SMTP credentials you should use to send emails.
        </p>
      </div>
    </div>
  </div>

  <div class="card border-primary">
    <div class="card-header border-primary">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab-09" aria-expanded="true">
          {{ __('How to get support?') }}
        </button>
      </h5>
    </div>
    <div id="tab-09" class="collapse">
      <div class="card-body text-body">
        <p>
          Please note that support can only be provided during the application support period. 6 months of free support are provided with your purchase. Should you need support outside of this period you will need to renew it.
          <a href="https://help.market.envato.com/hc/en-us/articles/207886473-Extending-and-Renewing-Item-Support" target="_blank"> How to extend / renew the app support? </a>
        </p>
        <p>
          To get technical support please submit a new ticket at
          <a href="https://support.financialplugins.com" target="_blank">https://support.financialplugins.com</a>. If you see an application error please do the following:
        </p>
        <ul>
          <li>Enable <b>Debug mode</b> (<b>Backend</b> » <b>Settings</b> » <b>Developer</b>)</li>
          <li>Repeat the error</li>
          <li>Make a screenshot of the error</li>
          <li>Check the browser console and make a screenshot if there are any errors</li>
          <li>Provide the above information along with the app error log (can be found in <b>storage/logs</b> folder)</li>
          <li>Provide steps to reproduce the error</li>
        </ul>
      </div>
    </div>
  </div>
</div>
