 <?php
print "Indomaret Poinku -Nabila Tools\n";
print "Thanks To : Muhammad Ikhsan Aprilyadi, Firman Tsani, Jumady\n";
echo "Masukan nomor : ";
$nomor = trim(fgets(STDIN));
$random = ['a','b','c','d','e','f'];
$abc = array_rand($random);
https://play.google.com/store/apps/details?id=com.indomaret.klikindomaret cari reff nya di apk klikindomaret
$devid = ''.mt_rand(1,9).''.$abc.''.mt_rand(111111,999999).'be'.$abc.'6f'.mt_rand(111,999).'';
//Sendotp
$data = '{"deviceId":"'.$devid.'", 	"phoneNumber":"'.$nomor.'"}';
$headers = array();
//Accept-Encoding: gzip 
$headers[] = 'Content-Length: '.strlen($data).'';
$headers[] = 'Host: edtsapp.indomaretpoinku.com';
$headers[] = 'Content-Type: application/json; charset=UTF-8';
$headers[] = 'Connection: Keep-Alive';
$headers[] = 'User-Agent: okhttp/4.9.0';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://edtsapp.indomaretpoinku.com/customer/api/login');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
curl_setopt($ch,CURLOPT_POST, true);
$hasil = curl_exec($ch);
$decode = json_decode($hasil,true);
if($decode['message'] == 'Success'){
  echo "Otp dikirim\n";
}else{ var_dump($hasil); die; }
//inputotp
echo "Masukan OTP : ";
$otp = trim(fgets(STDIN));
$data = '{"deviceId":"'.$devid.'","otp":"'.$otp.'","phoneNumber":"'.$nomor.'"}';
$headers = array();
//Accept-Encoding: gzip 
$headers[] = 'Content-Length: '.strlen($data).'';
$headers[] = 'Host: edtsapp.indomaretpoinku.com';
$headers[] = 'Content-Type: application/json; charset=UTF-8';
$headers[] = 'Connection: Keep-Alive';
$headers[] = 'User-Agent: okhttp/4.9.0';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://edtsapp.indomaretpoinku.com/customer/api/login-verified');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
curl_setopt($ch,CURLOPT_POST, true);
$hasil = curl_exec($ch);
$decode = json_decode($hasil,true);
if($decode['message'] == 'Success'){
$auth = $decode['data']['access_token'];
//echo $auth."\n";
$file = fopen('idmpoin.txt', 'a'); 
$saveinfo = "bearer $auth \n";
fwrite($file, $saveinfo);
}else{ var_dump($hasil); die; }
//Search kode
kodereff:
$headers = array();
$headers[] = 'Host: api.klikindomaret.com';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Connection: Keep-Alive';
$headers[] = 'User-Agent: okhttp/4.9.0';
$ch = curl_init();
//-6.2194837735324615&Long=106.69512737542391
curl_setopt($ch, CURLOPT_URL, 'https://api.klikindomaret.com/api/Store/GetListByAreaWilayahStore?Lat=-6.'.mt_rand(1111111111111111,9999999999999999).'&Long=106.'.mt_rand(11111111111111,99999999999999).'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
$hasil = curl_exec($ch);
$decode = json_decode($hasil,true);
if($hasil == "[]"){
  goto kodereff;
}else{
  $reff = $decode['0']['ID'];
}

//Redeem voucher
$data = '{"couponPromoCode":"'.$reff.'"}';
$headers = array();
//Accept-Encoding: gzip 
$headers[] = 'Content-Length: '.strlen($data).'';
$headers[] = 'authorization: Bearer '.$auth.'';
$headers[] = 'Host: edtsapp.indomaretpoinku.com';
$headers[] = 'Content-Type: application/json; charset=UTF-8';
$headers[] = 'Connection: Keep-Alive';
$headers[] = 'User-Agent: okhttp/4.9.0';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://edtsapp.indomaretpoinku.com/coupon/api/mobile/gift/redeem');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
curl_setopt($ch,CURLOPT_POST, true);
$hasil = curl_exec($ch);
$decode = json_decode($hasil,true);
if($decode['message'] == 'Success'){
  echo $decode['data']['content']['0']['couponName']."\n";
}else{ var_dump($hasil); }
//Cek voc
sleep(5);
$headers = array();
//Accept-Encoding: gzip 
//$headers[] = 'Content-Length: '.strlen($data).'';
$headers[] = 'authorization: Bearer '.$auth.'';
$headers[] = 'Host: edtsapp.indomaretpoinku.com';
$headers[] = 'Content-Type: application/json; charset=UTF-8';
$headers[] = 'Connection: Keep-Alive';
$headers[] = 'User-Agent: okhttp/4.9.0';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://edtsapp.indomaretpoinku.com/coupon/api/mobile/coupons?page=0&sort=isValidStartDate%2Cdesc&sort=expiredDate%2Casc&size=7');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
//curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
//curl_setopt($ch,CURLOPT_POST, true);
$hasil = curl_exec($ch);
$decode = json_decode($hasil,true);
if($decode['message'] == 'Success'){
  for($i=0;$i<count($decode['data']['content']);$i++){
  echo $decode['data']['content'][$i]['couponName']." - ";
  echo $decode['data']['content'][$i]['couponCode']."\n";
  }
}else{ var_dump($hasil); }


