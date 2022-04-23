 
1000 = Invalid user or Password
1002 = Empty Number
1003 = Invalid message or empty message
1004 = Invalid number
1005 = All Number is Invalid 
1006 = insufficient Balance 
1009 = Inactive Account
1010 = Max number limit exceeded
1101 = Success

কর্তৃপক্ষের অনুমতি  ছাড়া কোন  OTP Verification Code পাঠালে আপনার account permanently Suspend করা  হবে
OTP পাঠানোর জন্য এই  ফরম্যাট  টি দেখুন  (Your {Company Name} OTP is XXXX) or ({Company Name } OTP Code is XXXX) যেমন  : Your Daraz.com OTP code is 1234 



আমাদের API GET and POST দুইভাবেই ব্যবহার করতে পারবেন । 
মোবাইল নাম্বার কমা (,) সেপারেটেড  অথবা  Newline/Space থাকতে হবে যেমন  (88017,017,17)
POST Method দিয়ে আপনি এক সাথে ৫০০০০ পর্যন্ত SMS পাঠাতে পারবেন এবং GET Method সাথে ২০ টা পর্যন্ত SMS পাঠাতে পারবেন. 

কিভাবে PHP ফাইল থেকে SMS পাঠাবেন ?

//POST Method example

$url = "http://66.45.237.70/api.php";
$number="88017,88018,88019";
$text="Hello Bangladesh";
$data= array(
'username'=>"YourID",
'password'=>"YourPasswd",
'number'=>"$number",
'message'=>"$text"
);

$ch = curl_init(); // Initialize cURL
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$smsresult = curl_exec($ch);
$p = explode("|",$smsresult);
$sendstatus = $p[0];


//Send SMS  from your database using php

$query = mysql_query("SELECT * FROM `smslog` WHERE `status`='Pending' LIMIT 500");
$row = mysql_num_rows($query );

$x = '';
while($val = mysql_fetch_array($mysql_query))

{	
$smsid= $val['id'];
$number = $val['number'];
$x = $x.$number.","; //number separated by comma
$text=$val['message']; 
mysql_query("UPDATE `smslog` SET `status`='DELIVRD' WHERE `id`='$smsid'");
}

$url = "http://66.45.237.70/api.php";
$data= array(
'username'=>"YourID",
'password'=>"YourPasswd",
'number'=>"$x",
'message'=>"$text"
);

$ch = curl_init(); // Initialize cURL
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$smsresult = curl_exec($ch);
$p = explode("|",$smsresult);
$sendstatus = $p[0];


//GET Method 
GET Method ব্যবহার করলে  SMS content urlencode() করতে হবে।

$text = urlencode("hello BULKSMS");

$smsresult = file_get_contents("http://66.45.237.70/api.php?username=yourid&password=yourpass&number=88017&message=$text");


//কিভাবে এসএমএস পাঠাবেন C# ব্যবহার করে Example 1

using System.IO;
using System;
using System.Net;
using System.Text;

class Program
{
    static void Main()
    {
        SMSSend("This is a test SMS From C#","88017,88018,88019,88016");
    }
    
    static void SMSSend(string messsage, string number)
    {

                String userid = "XXX"; //Your Login ID
                String password = "XXXX"; //Your Password
                //Recipient Phone Number multiple number must be separated by comma
                String message = System.Uri.EscapeUriString(messsage);

                // Create a request using a URL that can receive a post.   
                WebRequest request = WebRequest.Create("http://66.45.237.70/api.php");
                // Set the Method property of the request to POST.  
                request.Method = "POST";
                // Create POST data and convert it to a byte array.  
                string postData = "username=" + userid + "&password=" + password + "&number=" + number + "&message=" + message;
                byte[] byteArray = Encoding.UTF8.GetBytes(postData);
                // Set the ContentType property of the WebRequest.  
                request.ContentType = "application/x-www-form-urlencoded";
                // Set the ContentLength property of the WebRequest.  
                request.ContentLength = byteArray.Length;
                // Get the request stream.  
                Stream dataStream = request.GetRequestStream();
                // Write the data to the request stream.  
                dataStream.Write(byteArray, 0, byteArray.Length);
                // Close the Stream object.  
                dataStream.Close();
                // Get the response.  
                WebResponse response = request.GetResponse();
                // Display the status.  
                Console.WriteLine(((HttpWebResponse)response).StatusDescription);
                // Get the stream containing content returned by the server.  
                dataStream = response.GetResponseStream();
                // Open the stream using a StreamReader for easy access.  
                StreamReader reader = new StreamReader(dataStream);
                // Read the content.  
                string responseFromServer = reader.ReadToEnd();
                // Display the content.  
                Console.WriteLine(responseFromServer);
                // Clean up the streams.  
                reader.Close();
                dataStream.Close();
                response.Close();
                
        }
}


//কিভাবে এসএমএস পাঠাবেন C# ব্যবহার করে example 2

using System;
using System.Collections.Generic;
using System.Text;
using System.Net;
using System.IO;

namespace Bulksmsbd.com{
    class Program{
        static void Main(string[] args){
        string result = "";
            WebRequest request = null;
            HttpWebResponse response = null;
            try{
                String userid = "XXX"; //Your Login ID
                  String password = "XXX"; //Your Password
                  String number = "88017,88019"; //Recipient Phone Number multiple number must be separated by comma
                String message = System.Uri.EscapeUriString("my messages"); //do not use single quotation (') in the message to avoid forbidden result
                String url = "http://66.45.237.70/api.php?username=" + userid + "&password=" + password + "&number=" + number+"&message=" + message;
                request = WebRequest.Create(url);
           
                // Send the 'HttpWebRequest' and wait for response.
                response = (HttpWebResponse) request.GetResponse();
                Stream stream = response.GetResponseStream();
                Encoding ec = System.Text.Encoding.GetEncoding("utf-8");
                StreamReader reader = new
                System.IO.StreamReader(stream, ec);
                result = reader.ReadToEnd();
                Console.WriteLine(result);
                reader.Close();
                stream.Close();
            } catch (Exception exp){
                Console.WriteLine(exp.ToString());
            } finally {
                if (response != null)
                    response.Close();
            }
        }
    }
}

//কিভাবে এসএমএস পাঠাবেন Oracle থেকে 

COMMIT_FORM;
 
 DECLARE
	smsto varchar2(500) := :SMS.PHONE_NO;
	message varchar2(500) := Utl_Url.escape(:SMS.TEXT_SMS, TRUE);
  req   UTL_HTTP.REQ;
  resp  UTL_HTTP.RESP;
  value VARCHAR2(5024); 
  v_url VARCHAR2(200) := 'http://66.45.237.70/api.php';
 
  v_param VARCHAR2(5000) := 'username=XXX&password=XXXX&number=' || smsto || '&message=' || message || '';
  v_param_length NUMBER := length(v_param);
BEGIN
  req := UTL_HTTP.BEGIN_REQUEST (url=> v_url, method => 'POST');
  UTL_HTTP.SET_HEADER (r      =>  req,
                       name   =>  'Content-Type',
                       value  =>  'application/x-www-form-urlencoded');
  UTL_HTTP.SET_HEADER (r      =>   req,
                       name   =>   'Content-Length',
                       value  =>   v_param_length);
  UTL_HTTP.WRITE_TEXT (r      =>   req,
                       data   =>   v_param);  resp := UTL_HTTP.GET_RESPONSE(req);
  LOOP
    UTL_HTTP.READ_LINE(resp, value, TRUE);
    DBMS_OUTPUT.PUT_LINE(value);
  END LOOP;
  UTL_HTTP.END_RESPONSE(resp);
EXCEPTION
  WHEN UTL_HTTP.END_OF_BODY THEN
    UTL_HTTP.END_RESPONSE(resp);
END;

//code for Java - OkHttp 

OkHttpClient client = new OkHttpClient().newBuilder()
  .build();
MediaType mediaType = MediaType.parse("application/x-www-form-urlencoded");
RequestBody body = RequestBody.create(mediaType, "");
Request request = new Request.Builder()
  .url("http://66.45.237.70/api.php?username=XX&password=XXX&number=8801&message=Test API")
  .method("POST", body)
  .addHeader("Content-Type", "application/x-www-form-urlencoded")
  .build();
Response response = client.newCall(request).execute();

//code for Java - Unirest

Unirest.setTimeouts(0, 0);
HttpResponse response = Unirest.post("http://66.45.237.70/api.php?username=XX&password=XXX&number=8801&message=Test%20API")
  .header("Content-Type", "application/x-www-form-urlencoded")
  .body("")
  .asString();

//code for JavaScript-Fetch
var myHeaders = new Headers();
myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

var raw = "";

var requestOptions = {
  method: 'POST',
  headers: myHeaders,
  body: raw,
  redirect: 'follow'
};

fetch("http://66.45.237.70/api.php?username=XX&password=XXX&number=8801&message=Test API", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));


//code for JavaScript-jQuery
var settings = {
  "url": "http://66.45.237.70/api.php?username=XX&password=XXX&number=8801&message=Test API",
  "method": "POST",
  "timeout": 0,
  "headers": {
    "Content-Type": "application/x-www-form-urlencoded"
  },
};

$.ajax(settings).done(function (response) {
  console.log(response);
});

//code for JavaScript-XHR

var data = "";

var xhr = new XMLHttpRequest();
xhr.withCredentials = true;

xhr.addEventListener("readystatechange", function() {
  if(this.readyState === 4) {
    console.log(this.responseText);
  }
});

xhr.open("POST", "http://66.45.237.70/api.php?username=XX&password=XXX&number=8801&message=Test%20API");
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

xhr.send(data);

//code for NodeJs - Native
var http = require('follow-redirects').http;
var fs = require('fs');

var options = {
  'method': 'POST',
  'hostname': '66.45.237.70',
  'path': '/api.php?username=XX&password=XXX&number=8801&message=Test%20API',
  'headers': {
    'Content-Type': 'application/x-www-form-urlencoded'
  },
  'maxRedirects': 20
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function (chunk) {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });

  res.on("error", function (error) {
    console.error(error);
  });
});

req.end();

//code for NodeJs - Request

var request = require('request');
var options = {
  'method': 'POST',
  'url': 'http://66.45.237.70/api.php?username=XX&password=XXX&number=8801&message=Test API',
  'headers': {
    'Content-Type': 'application/x-www-form-urlencoded'
  }
};
request(options, function (error, response) { 
  if (error) throw new Error(error);
  console.log(response.body);
});

//code for NodeJs - Unirest

var unirest = require('unirest');
var req = unirest('POST', 'http://66.45.237.70/api.php?username=XX&password=XXX&number=8801&message=Test API')
  .headers({
    'Content-Type': 'application/x-www-form-urlencoded'
  })
  .send("")
  .end(function (res) { 
    if (res.error) throw new Error(res.error); 
    console.log(res.raw_body);
  });

//code for Python - http.client

import http.client
import mimetypes
conn = http.client.HTTPSConnection("66.45.237.70")
payload = ''
headers = {
  'Content-Type': 'application/x-www-form-urlencoded'
}
conn.request("POST", "/api.php?username=XX&password=XXX&number=8801&message=Test API", payload, headers)
res = conn.getresponse()
data = res.read()
print(data.decode("utf-8"))


//code for Python - Requests

import requests

url = "http://66.45.237.70/api.php?username=XX&password=XXX&number=8801&message=Test API"

payload  = {}
headers = {
  'Content-Type': 'application/x-www-form-urlencoded'
}

response = requests.request("POST", url, headers=headers, data = payload)

print(response.text.encode('utf8'))


//code for Ruby-Net::HTTP

require "uri"
require "net/http"

url = URI("http://66.45.237.70/api.php?username=XX&password=XXX&number=8801&message=Test API")

http = Net::HTTP.new(url.host, url.port);
request = Net::HTTP::Post.new(url)
request["Content-Type"] = "application/x-www-form-urlencoded"

response = http.request(request)
puts response.read_body



