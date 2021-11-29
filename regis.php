<?php

echo "Auto Register Klik Indomaret\n";
echo "[?] Nomor HP: ";
$nomor = trim(fgets(STDIN));



$headers[] = 'accept-encoding: gzip, deflate, br';
$headers[] = 'accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7,fr;q=0.6,ms;q=0.5';
$headers[] = 'content-type: application/json';
$headers[] = 'origin: https://account.klikindomaret.com';
$headers[] = 'referer: https://account.klikindomaret.com/';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://account-api-v1.klikindomaret.com/api/PreRegistration/SendOTPSMS?NoHP='.$nomor.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, 1);
$output = curl_exec($ch);
curl_close($ch);
echo $output;


echo "\n[?] OTP: ";
$otp = trim(fgets(STDIN));

$headers[] = 'accept-encoding: gzip, deflate, br';
$headers[] = 'accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7,fr;q=0.6,ms;q=0.5';
$headers[] = 'content-type: application/json';
$headers[] = 'origin: https://account.klikindomaret.com';
$headers[] = 'referer: https://account.klikindomaret.com/';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://account-api-v1.klikindomaret.com/api/PreRegistration/ValidationOTPCodeSMS?NoHP='.$nomor.'&otpCode='.$otp.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, 1);
$sendotp = curl_exec($ch);
curl_close($ch);
echo $sendotp;
echo "\n";
$data = '{"nomor":"","isVaildPhoneNo":false,"messageError":"","Mobile":"'.$nomor.'","Email":null,"FName":"Wahyu","LName":"Saputra","Password":"walut123","ConfirmPassword":"walut123","IsConfirmed":true,"valueDate":"","isLoading":false,"ID":"00000000-0000-0000-0000-000000000000","IPAddress":"192.168.56.132","IsSubscribed":0,"IsNewsLetterSubscriber":0,"AllowSMS":false,"LastUpdate":"0001-01-01T00:00:00","DateOfBirth":"2000-05-'.rand(01, 30).'T23:00:00.000Z","Gender":"Pria","DateOfBirthStringFormatted":"2000-05-'.rand(01, 30).'","TypePushEmail":0,"IsUpload":false,"IsActivated":false,"MobileVerified":true,"DateOfBirthExists":"0001-01-01T00:00:00","OTPValidationExpired":false,"IsFromOtherSystem":false,"OTPCount":0,"OTPAvailable":0,"IsNewAccount":true,"Origin":"Registrasi Website"}';
$headers = array();
$headers[] = 'accept-encoding: gzip, deflate, br';
$headers[] = 'accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7,fr;q=0.6,ms;q=0.5';
$headers[] = 'content-type: application/json';
$headers[] = 'origin: https://account.klikindomaret.com';
$headers[] = 'referer: https://account.klikindomaret.com/';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://account-api-v1.klikindomaret.com/api/Customer/Registration?districtID=2483&mfp_id=1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
curl_setopt($ch,CURLOPT_POST, true);
$hasil = curl_exec($ch);
echo $hasil;
echo "\n";
file_put_contents("no.txt", $nomor." | YOUR PASSWORD\n", FILE_APPEND);