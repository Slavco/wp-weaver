# wp-weaver
Aim of this project is to harden and remediate 30%+ of the web.

## WordPress and its security solutions
WordPress employs few mechanisms that are considered enough for self healing / cleaning of compromised WP instances around the web via its administration interface and cli. Same and more powerful approaches are employed by 3rd pary security solutions that come in WP as plugins and services. Is this enough for recovering compromised WP instance? **NO!**

## Usage
Auto-updates are enabled on your wp instance and you can update/re-install via administration area.

1. `cat weaver.txt >> /path/to/your/wp/wp-includes/default-constants.php`
2. `http://wp.local?wppply=ok` response should be `deeply`
3. Hit update/re-install and repeat step **2**  

**But I have one of the most popular security plugins installed and I have premium versions!**

Simple usage as described above will not be able to detect infected file and won't be able to find the payload if there isn't request that is being served atm. If there is request, then all of those solutions will find nothing :/

How that?

`php peer.php http://wp.local?peer=ok 1000`

*run the scan during this 1000 sec.*

## Remediation (talking about core files)
1. Turn down the PHP on the host e.g. no active connections / php workers
2. Download the core offsite
3. Replace old files with new ones from wp . org and remove files that don't belong to the core
*there is no free tool in the eco system that will do this*

## What security mechanisms will fail against weaver
- WP administration 
- wp-cli and its doctor command
- every plugin that scans core via its PHP logic
- plugins that download files via SFTP, SSH and scan them offsite should be lucky to capture the code and won't be able to clean it offsite, because is jumping from file to file.

## Solution?
There are few solutions in progress and until then you can ask WordPress security/core team or your premium plugin support.

## What is next
Adding more and more interesting evasion, code execution and data exfiltration techniques that will serve as ultimate test in your web host / security solution choice.

## Want to support this project
Drop me a note at `slavco[d0t]mihajloski[aT]gmail[d0t]com`
