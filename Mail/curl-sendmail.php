curl --request POST \
--url https://api.sendinblue.com/v3/smtp/email \
--header 'accept: application/json' \
--header 'api-key:' \
--header 'content-type: application/json' \
--data '{
"sender": {
"name": "Pritesh Yadav",
"email": "priteshyadav2015@gmail.com"
},
"to": [{
"email": "adarsh.haldar@kodytechnolab.com",
"name": "Aadrash haldi"
}],
"subject": "Hello world",
"htmlContent": "Test 1"
}'