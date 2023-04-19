![readme-1](https://user-images.githubusercontent.com/14218574/232992658-f48ff48e-6ca6-48d6-ab60-78e0731bf030.jpg)

# unlimiCore Engineering System

2003/4 - primitive

Core Component - Overview

.htaccess

- All Pages accessed via /NAME-OF-PAGE vs. name-of-page.php
- Execute > core.exe.php
- All Sub-Pages = subpage.VIEWNAME
- Location = ROOT DIRECTORY

SM.core.view.php

- Location = ROOT DIRECTORY
- View / HTML Presentation
- GET \_reg = 666 NO INCLUDE OF TOPNAV.PHP
- GET \_function > SESSION ‘ActiveUser’ ‘CurrentPage’
- Main Functionality based on 1 Switch = GET \_function

SM.core.exe.php

- Location = ROOT DIRECTORY
- INCLUDES: Class Main, Class Ext, Utils, Error Header, Additional As Needed
- INSTANTIATION: $obj_Member (MAIN OBJECT)
- Creates User Session > Reviews User Session as Authenticated
- 3 Levels of Function Execution: Unauthorized Explicit, Authorized Explicit, Open
- Purpose: Handle Execution/Communication between JS (FrontEnd) & Class (BackEnd)
- GET & POST Accepted for \_function

SM.topnav.php

- Location = /common/header/topnav.php
- First loaded code / header
- Cache Settings
- Require/Includes
- Instantiation
- Cookie Handling & Authentication
- Database Connection Instantiation
- Browser Detection
- Dynamic SEO Handling
- CSS, JS Inclusion
- Top Header Navigation System

 SMLIB (custom JS framework)
 SM.lib.TELEPHONY.js
 SM.lib.EFFECTS.js
 SM.lib.FORMS.js
 SM.lib.HELPDESK.js
 SM.lib.REPORTS.js

Class.unlimiCore

- Core Low Level functionality
- User Creation, Analytics, Report Generation, Upload Asset Handling, etc
- extended by ext.class.member.memberNAMEOFPROPERTY.php
- Location = /common/class/class.member.php

Class.DB

- Low Level database connection handling
- Location = /common/class/class.db.php
- NO EDITING REQUIRED OR EXPECTED

Class.Encrypt

- Low Level encryption handling
- Location = /common/class/class.encrypt.php
- NO EDITING REQUIRED OR EXPECTED
- Public (1024) & Private (256) Encryption supportive

Class.Session

- Low Level DB Sessions
- Location = /common/class/class.Session.php
- NO EDITING REQUIRED OR EXPECTED

EXT.Class.unlimiCore.PROPERTY

- Low Level DB Sessions
- Location = /common/class/class.Session.php
- NO EDITING REQUIRED OR EXPECTED

uc r1

.htaccess
core.exe
core.view
member.class
ext.class
topnav
css
js lib
db

key points of interest
relationship
database tie-in
topnav navigation
dynamic seo/page properties
tag dyn
global vars
object instantiation
css
navigation

modules and per user type and level integration
module model
user type and level model
module per page relations
nav.3 dyn module button generation

form validation system
db rule set
js - exe tie in
ajax comm
form element replication

js tie-in w/ above

diagram of classes and low level data handling

see visio

sessions and session actions
db sessions
session actions
tracking purpose

config - modes

image upload - php cache and ajax feedback div port js into main slib integrate email vlidation with signup process
notification system cron tab user. profile ajax systeom + ajax tie ins mass create - generic mass remove zipcode table
geocode and cache system

base admintools w/ god account



![readme-2](https://user-images.githubusercontent.com/14218574/232992648-67fc2a63-8420-48e9-b851-d3a422f042ae.jpg)
![readme-3](https://user-images.githubusercontent.com/14218574/232992655-eab19bf1-66ae-415f-9418-2759c5492f70.jpg)

