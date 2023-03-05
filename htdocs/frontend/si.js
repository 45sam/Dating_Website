// // Google Sign-In
// function onSignIn(googleUser) {
//     // Get the Google Sign-In ID token and send it to your backend
//     var id_token = googleUser.getAuthResponse().id_token;
//     // ...
//   }
  
//   document.getElementById('google-sign-in').addEventListener('click', function() {
//     // Initiate the Google Sign-In API
//     gapi.load('auth2', function() {
//       gapi.auth2.init({
//         client_id: 'YOUR_GOOGLE_CLIENT_ID'
//       }).then(function() {
//         // Sign in the user
//         gapi.auth2.getAuthInstance().signIn().then(onSignIn);
//       });
//     });
//   });
  
//   // Facebook Sign-In
//   window.fbAsyncInit = function() {
//     FB.init({
//       appId: 'YOUR_FACEBOOK_APP_ID',
//       cookie: true,
//       xfbml: true,
//       version: 'v11.0'
//     });
    
//     FB.AppEvents.logPageView();
//   };
  
//   document.getElementById('facebook-sign-in').addEventListener('click', function() {
//     // Trigger the Facebook Login API
//     FB.login(function(response) {
//       if (response.authResponse) {
//         // Get the Facebook access token and send it to your backend
//         var access_token = response.authResponse.accessToken;
//         // ...
//       } else {
//         console.log('User cancelled login or did not fully authorize.');
//       }
//     }, {scope: 'email'});
//   });
  
var signupButton = document.getElementById("signup-button");

signupButton.addEventListener("click", function() {
  // authenticate the user with Gmail API
  // create an instance of the Google Sign-In API
  var auth2 = gapi.auth2.getAuthInstance();
  
  // request user authorization and retrieve the user profile
  auth2.signIn().then(function(googleUser) {
    // get the user's email address and ID token
    var email = googleUser.getBasicProfile().getEmail();
    var idToken = googleUser.getAuthResponse().id_token;
    
    // send the user's email and ID token to the server to complete sign-up
    // you can use AJAX to send a POST request to the server with the user data
    // for example:
    // $.post("/signup", { email: email, id_token: idToken })
    //   .done(function(data) {
    //     // handle successful sign-up response from the server
    //   })
    //   .fail(function(error) {
    //     // handle sign-up error from the server
    //   });
  });
});
