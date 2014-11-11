SoftLayer Message Queue - PHP Client
========================================
This code provides PHP 5.3+ bindings written in PHP to communicate with the
[SoftLayer Message Queue API](http://sldn.softlayer.com/reference/messagequeueapi).

Composer Installation
---------------------

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `nathanmac/softlayer-message-queue-php`.

	"require": {
		"nathanmac/softlayer-message-queue-php": "1.*"
	}

Next, update Composer from the Terminal:

    composer update

Requirements
------------
* PHP 5.3 or later
* cURL support
* PHPUnit 3.6 or later (to run the test suite)
* An active SoftLayer customer account with message queue service

Need more help?
---------------

For additional guidance and information, check out the
[Message Queue API reference](http://sldn.softlayer.com/reference/messagequeueapi) 
or the [SoftLayer Developer Network forum](https://forums.softlayer.com/forumdisplay.php?f=27).

License
-------

Copyright (c) 2012 SoftLayer Technologies, Inc.

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies
of the Software, and to permit persons to whom the Software is furnished to do
so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
