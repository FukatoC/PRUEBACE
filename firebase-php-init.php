<?php
// Import the functions you need from the SDKs you need
use Google\Cloud\Core\ExponentialBackoff;
use Google\Cloud\Firestore\FirestoreClient;

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
$firebaseConfig = [
  'apiKey' => 'AIzaSyB9L3Zp3iMBb-e3WXXUzrbiJMeC4A6TV00',
  'authDomain' => 'conti-event.firebaseapp.com',
  'projectId' => 'conti-event',
  'storageBucket' => 'conti-event.appspot.com',
  'messagingSenderId' => '1085372616585',
  'appId' => '1:1085372616585:web:4c0cfc1c12e957b9fc9b58',
  'measurementId' => 'G-W993NSYGBX'
];

// Initialize Firebase
$firestore = new FirestoreClient([
  'projectId' => $firebaseConfig['projectId'],
  'keyFile' => json_decode(file_get_contents(__DIR__ . '/service-account.json'), true),
]);
?>
``