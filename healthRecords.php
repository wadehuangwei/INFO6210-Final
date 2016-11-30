<?php
require_once 'vendor/autoload.php';
	use djchen\OAuth2\Client\Provider\Fitbit;

$provider = new Fitbit([
    'clientId'          => '227XBX',
    'clientSecret'      => '3b97686387de01d61fc1ce998cc0f4e4',
    'redirectUri'       => 'http://localhost/INFO6210-Final/healthRecordPage.php'
]);

// start the session
session_start();

// If we don't have an authorization code then get one
if (!isset($_GET['code'])) {

    // Fetch the authorization URL from the provider; this returns the
    // urlAuthorize option and generates and applies any necessary parameters
    // (e.g. state).
    $authorizationUrl = $provider->getAuthorizationUrl();

    // Get the state generated for you and store it to the session.
    $_SESSION['oauth2state'] = $provider->getState();

    // Redirect the user to the authorization URL.
    header('Location: ' . $authorizationUrl);
    exit;

// Check given state against previously stored one to mitigate CSRF attack
} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
    unset($_SESSION['oauth2state']);
    exit('Invalid state');

} else {

    try {

        // Try to get an access token using the authorization code grant.
        $accessToken = $provider->getAccessToken('authorization_code', [
            'code' => $_GET['code']
        ]);

        // We have an access token, which we may use in authenticated
        // requests against the service provider's API.
        // echo $accessToken->getToken() . "\n";
        // echo $accessToken->getRefreshToken() . "\n";
        // echo $accessToken->getExpires() . "\n";
        // echo ($accessToken->hasExpired() ? 'expired' : 'not expired') . "\n";

        // Using the access token, we may look up details about the
        // resource owner.
        $resourceOwner = $provider->getResourceOwner($accessToken);

        // var_export($resourceOwner->toArray());

        // The provider provides a way to get an authenticated API request for
        // the service, using the access token; it returns an object conforming
        // to Psr\Http\Message\RequestInterface.
        $request = $provider->getAuthenticatedRequest(
            Fitbit::METHOD_GET,
            Fitbit::BASE_FITBIT_API_URL . '/1/user/-/profile.json',
            $accessToken,
            ['headers' => [Fitbit::HEADER_ACCEPT_LANG => 'en_US'], [Fitbit::HEADER_ACCEPT_LOCALE => 'en_US']]
            // Fitbit uses the Accept-Language for setting the unit system used
            // and setting Accept-Locale will return a translated response if available.
            // https://dev.fitbit.com/docs/basics/#localization
        );
        // Make the authenticated API request and get the response.
        $response = $provider->getResponse($request);

        // echo'<pre>';
        // var_dump($response);
        // echo'<pre>';

        $request = $provider->getAuthenticatedRequest(
            Fitbit::METHOD_GET,
            Fitbit::BASE_FITBIT_API_URL . '/1/user/-/activities/heart/date/2016-11-26/1d.json',
            $accessToken,
            ['headers' => [Fitbit::HEADER_ACCEPT_LANG => 'en_US'], [Fitbit::HEADER_ACCEPT_LOCALE => 'en_US']]
            // Fitbit uses the Accept-Language for setting the unit system used
            // and setting Accept-Locale will return a translated response if available.
            // https://dev.fitbit.com/docs/basics/#localization
        );
        // Make the authenticated API request and get the response.
        $heartRate = $provider->getResponse($request);

        echo '<pre>';
        // var_dump($heartRate);
        echo '</pre>';

        // $provider->revoke($accessToken);
    } catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {

        // Failed to get the access token or user details.
        exit($e->getMessage());

    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Home
    </title>
    <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 60%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
    <a href='homepage.php'>Home Page</a>
    <h1>Profile:</h1><br>
    <table>
      <tr>
        <th>Item</th>
        <th>Value</th>
      </tr>
      <tr>
        <td>Full Name:</td>
        <td><?php echo $response['user']['fullName']; ?></td>
      </tr>
      <tr>
        <td>Age</td>
        <td><?php echo $response['user']['age']; ?></td>
      </tr>
      <tr>
        <td>dateOfBirth</td>
        <td><?php echo $response['user']['dateOfBirth']; ?></td>
      </tr>
      <tr>
        <td>gender</td>
        <td><?php echo $response['user']['gender']; ?></td>
      </tr>
      <tr>
        <td>Country</td>
        <td><?php echo $response['user']['country']; ?></td>
      </tr>
      <tr>
        <td>memberSince</td>
        <td><?php echo $response['user']['memberSince']; ?></td>
      </tr>
    </table>
</br>
<h1>Heart Rate:</h1>
<b>Date: <?php echo $heartRate['activities-heart'][0]['dateTime']; ?></b></br>
    <table>
      <tr>
        <th>Max</th>
        <th>Min</th>
        <th>Name</th>
      </tr>
      <?php
        foreach ($heartRate['activities-heart'][0]['value']['heartRateZones'] as $hrz) {
            $output = '<tr>';
            $output .= '<td>' . $hrz['max'] . '</td>';
            $output .= '<td>' . $hrz['min'] . '</td>';
            $output .= '<td>' . $hrz['name'] . '</td>';
            $output .= '</tr>';
            echo $output;
        }
      ?>
    </table>
</body>
</html>