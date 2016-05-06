<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->
**Table of Contents**  *generated with [DocToc](https://github.com/thlorenz/doctoc)*

- [What is Annotate ME?](#what-is-annotate-me)
- [Overview](#overview)
  - [Technical Details](#technical-details)
  - [Annotation in Firefox](#annotation-in-firefox)
- [How to Use Annotate ME](#how-to-use-annotate-me)
  - [Installation Instructions](#installation-instructions)
  - [Annotating text](#reading-annotating-and-writing)
- [How to Contribute](#how-to-contribute)
  - [Submit a Bug Report](#submit-a-bug-report)
  - [Suggest New Features](#suggest-new-features)
  - [Submit a Pull Request](#submit-a-pull-request)
- [Credits](#credits)
- [Supporters](#supporters)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

# What is Annotate ME?
Annotate ME extension/plugin allows users to annotate texts/date in google chrome,chromium,firefox web browser.By this we are plannig to build a database with texts and their category which will be used by Dr.Ashish Anand to feed for his Machine Learning Algorithms.This is our first step towards it.Any user can simply select text in browser page and put an appropriate label to it and one can also visit website to see previously annotated texts. We are also planning to make this data openly available so that any one who needs this data for his research work can get it.

# Services Used:
We are aggreeing to all terms and conditions to use [Google Chrome API](https://developers.google.com/terms/).

# Overview
## Technical Details
Annotate ME is built with [Javascript](https://www.javascript.com/), [HTML/CSS](https://developer.mozilla.org/en/docs/Web/Guide/HTML),[PHP/MySQLi](http://php.net/),[XAMPP Package](https://www.apachefriends.org/index.html). It has required a web server, a database (typically MySQLi), and PHP 5.3+.

## Annotation in Firefox
This is simple and being very useful in near future specially for research purpose.It allows user to select and store their annotated data in database on a global server from where user can get the data as required by him like texts annotated only by him,all data under specific category,etc.

# How to Use Annotate ME

## Installation Instructions

Follow the standard [XAMPP installation process](https://www.apachefriends.org/download.html), but instead of downloading the code as stated in Step 1, download our code instead:

```
git clone https://gitlab.com/rahulranjan96/team2cs243.git
```

You could, of course, download a zipfile of all the code, but we recommend using Git, which will make it easier to get updates. If you choose to use git, you will want to add this repository as a remote:

```
git remote add origin https://gitlab.com/rahulranjan96/team2cs243.git
```

For Firefox Extension
```
Open your firefox browser.
Type in about:debugging#addons in the top search box.
Click on Load Temporary Addon and browse to the the directory where your addon reside.
Double Click on manifest.json file now you can see the addon icon added to your browser actio.

To remove your addon:
Goto about:addons
Click on the remove button.
Refresh your window.
```

Well,extension has been installed to browser.

# Licence
This software is Licenced Under [Apache License,Version 2.0](http://www.apache.org/licenses/LICENSE-2.0).

## Annotating Text
It is very simple and cool to annotate text from browser.Simply select text you want to annotate.Use browser action or context menu to annotate.Label your text what you want and submit it!

# How to Contribute
The primary avenue for support and contributions to Annotate ME will be through our GitLab repository. Please use the [issues feature](https://gitlab.com/rahulranjan96/team2cs243/issues) to contact us.


## Submit a Bug Report
If you find a bug, please submit [create a bug report](https://gitlab.com/rahulranjan96/team2cs243/issues/new). Be sure to provide enough information so that we can duplicate the problem. If you're not sure how to write a good bug report, read [Mozilla's excellent guide](https://developer.mozilla.org/en-US/docs/Mozilla/QA/Bug_writing_guidelines) first.

## Suggest New Features
Do you find yourself trying to do something over and over that Annotate ME either doesn't make easy or won't let you do at all? Great! Let us know about it, again by submitting an issue. Please label it as an "enhancement" and we can start to discuss your idea.

## Submit a Pull Request
Want to improve or extend Annotate ME yourself? That's great! Please, don't keep the changes to yourself. Fork our repository and send a pull request. If it's something we agree should be in the main distribution, we'd love to merge your request and will gladly give you credit for the work.

# Credits
Here are the people who contributed code to the project, in boring alphabetical order:

* Rahul Ranjan
* Shah Het Jageshkumar
* Kamal Kishore Jain
* Gottapu Sravan Kumar
* Maloth Teja

# Supporters
These people at IIT Guwahati all contributed in substantial ways to making Annotate ME possible:
* [Saurabh Joshi](http://jatinga.iitg.ernet.in/~sbjoshi/),Assistant Professor
* [Ashish Anand](http://www.iitg.ernet.in/anand.ashish/),Assistant Professor
* [Saroj S](),Teaching Assistant

