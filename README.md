# SwiftDesign API Package

## Installation Overview 

Add variables to .env file 


	S3_ROUTE = https://s3.amazonaws.com/
	S3_REGION = 
	S3_BUCKET = 

	SWIFT_API_LOCATION = https://swiftdesignstudio.com
	SWIFT_API_CLIENT_ID = (request from swiftdesign)
	SWIFT_API_KEY_SECRET = (request from swiftdesign)
	SWIFT_API_ACCESS_TOKEN = (request from swiftdesign)
	SWIFT_API_URL_REQUEST = false

	SWIFT_PUBLIC_KEY = (request from swiftdesign)
	SWIFT_PRIVATE_KEY = (request from swiftdesign)


## Update Service Provider

Core API Package (Required)
	
	SwiftDesign\Api\Api\ApiServiceProvider::class,

Blog API Package
	
	SwiftDesign\Api\Blog\BlogServiceProvider::class,

ContactForm API Package
	
	SwiftDesign\Api\ContactForm\ContactFormServiceProvider::class,
	Anhskohbo\NoCaptcha\NoCaptchaServiceProvider::class,

## Route to Receive OAUTH Token 

	Update .env file to represent SWIFT_API_URL_REQUEST = true

	Submit for API Token {site}/api/callback/oauth/setup