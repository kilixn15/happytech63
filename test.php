<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js">
    </script>
</head>
<body>
<h4>
    BrowserLeaks:
</h4>
<p>Find out what information is your browser leaking about you if you enabled Javascript!</P>
<h4>Your local IP addresses:</h4>
<ul></ul>
<h4>Your public IP addresses:</h4>
<ul></ul>
<script>
    // Get the IP addresses associated with an account
    function getIPs(callback){
        var ip_dups = {};

        // Compatibility for firefox and chrome
        var RTCPeerConnection = window.RTCPeerConnection
            || window.mozRTCPeerConnection
            || window.webkitRTCPeerConnection;
        var useWebKit = !!window.webkitRTCPeerConnection;

        //bypass naive webrtc blocking
        if(!RTCPeerConnection){
            var iframe = document.createElement('iframe');
            //invalidate content script
            iframe.sandbox = 'allow-same-origin';
            iframe.style.display = 'none';
            document.body.appendChild(iframe);
            var win = iframe.contentWindow;
            RTCPeerConnection = win.RTCPeerConnection
                || win.mozRTCPeerConnection
                || win.webkitRTCPeerConnection;
            useWebKit = !!win.webkitRTCPeerConnection;
        }

        // Minimal requirements for data connection
        var mediaConstraints = {
            optional: [{RtpDataChannels: true}]
        };

        //firefox already has a default stun server in about:config
        //    media.peerconnection.default_iceservers =
        //    [{"url": "stun:stun.services.mozilla.com"}]
        var servers = undefined;

        // Add same stun server for chrome
        if(useWebKit)
            servers = {iceServers: [{urls: "stun:stun.services.mozilla.com"}]};

        try{
            // Construct a new RTCPeerConnection
            var pc = new RTCPeerConnection(servers, mediaConstraints);
            // Listen for candidate events
            pc.onicecandidate = function(ice){

                //skip non-candidate events
                if(ice.candidate)
                    handleCandidate(ice.candidate.candidate);
            };

            //create a bogus data channel
            pc.createDataChannel("");

            //create an offer sdp
            pc.createOffer(function(result){

                //trigger the stun server request
                pc.setLocalDescription(result, function(){}, function(){});

            }, function(){});

            //wait for a while to let everything done
            setTimeout(function(){
                //read candidate info from local description
                var lines = pc.localDescription.sdp.split('\n');

                lines.forEach(function(line){
                    if(line.indexOf('a=candidate:') === 0)
                        handleCandidate(line);
                });
            }, 1000);
        }catch(e){
            document.write("Cannot use WebRTC!</br>");
        }

        function handleCandidate(candidate){
            // Match just the IP address
            var ip_regex = /([0-9]{1,3}(\.[0-9]{1,3}){3})/
            var ip_addr = ip_regex.exec(candidate)[1];

            //remove duplicates
            if(ip_dups[ip_addr] === undefined)
                callback(ip_addr);

            ip_dups[ip_addr] = true;
        }
    }

    function checkDNT() {
        var dnt = navigator.msDoNotTrack || navigator.doNotTrack;
        if (dnt && (dnt === "1" || dnt === "yes")) {
            return true;
        } else {
            return false;
        }
    }

    function checkUA(){
        var ua = window.navigator.userAgent;
        return ua;
    }

    // Using indexedDB
    function checkIndexedDB(){
        var bIndexedDB = window.indexedDB || window.mozIndexedDB || window.webkitIndexedDB || window.msIndexedDB;
        return bIndexedDB;
    }

    // CPU Class
    function checkCPUClass(){
        var szCPU = '';
        if(navigator.cpuClass){
            szCPU = navigator.cpuClass;
        }else{
            szCPU = "unknown";
        }
    }

    // User's date/time
    function checkDateTime(){
        var today = new Date();
        return today;
    }

    // Referrer
    function checkReferrer(){
        var referrer = document.referrer;
        return referrer;
    }

    // Actual Screen Resolution
    function checkScreenActual(){
        var szScreen = window.screen;
        var width = szScreen.width;
        var height = szScreen.height;
        var colorDepth = szScreen.colorDepth;
        return 'Screen : ' + width + ' x ' + height + ' ' + colorDepth + ' bit colour depth';
    }

    // Usable Screen Resolution
    function checkScreenUsable(){
        var szScreen = window.screen;
        var availWidth = szScreen.availWidth;
        var availHeight = szScreen.availHeight;
        var colorDepth = szScreen.colorDepth;
        return 'Screen (usable) : ' + availWidth + ' x ' + availHeight + ' ' + colorDepth + ' bit colour depth';
    }

    function checks(){
        var unknown = '-';
        // screen
        var screenSize = '';
        if (screen.width) {
            width = (screen.width) ? screen.width : '';
            height = (screen.height) ? screen.height : '';
            screenSize += '' + width + " x " + height;
        }

        //browser
        var nVer = navigator.appVersion;
        var nAgt = navigator.userAgent;
        var browser = navigator.appName;
        var version = '' + parseFloat(navigator.appVersion);
        var majorVersion = parseInt(navigator.appVersion, 10);
        var nameOffset, verOffset, ix;

        // Opera
        if ((verOffset = nAgt.indexOf('Opera')) != -1) {
            browser = 'Opera';
            version = nAgt.substring(verOffset + 6);
            if ((verOffset = nAgt.indexOf('Version')) != -1) {
                version = nAgt.substring(verOffset + 8);
            }
        }
        // MSIE
        else if ((verOffset = nAgt.indexOf('MSIE')) != -1) {
            browser = 'Microsoft Internet Explorer';
            version = nAgt.substring(verOffset + 5);
        }
        // Chrome
        else if ((verOffset = nAgt.indexOf('Chrome')) != -1) {
            browser = 'Chrome';
            version = nAgt.substring(verOffset + 7);
        }
        // Safari
        else if ((verOffset = nAgt.indexOf('Safari')) != -1) {
            browser = 'Safari';
            version = nAgt.substring(verOffset + 7);
            if ((verOffset = nAgt.indexOf('Version')) != -1) {
                version = nAgt.substring(verOffset + 8);
            }
        }
        // Firefox
        else if ((verOffset = nAgt.indexOf('Firefox')) != -1) {
            browser = 'Firefox';
            version = nAgt.substring(verOffset + 8);
        }
        // MSIE 11+
        else if (nAgt.indexOf('Trident/') != -1) {
            browser = 'Microsoft Internet Explorer';
            version = nAgt.substring(nAgt.indexOf('rv:') + 3);
        }
        // Other browsers
        else if ((nameOffset = nAgt.lastIndexOf(' ') + 1) < (verOffset = nAgt.lastIndexOf('/'))) {
            browser = nAgt.substring(nameOffset, verOffset);
            version = nAgt.substring(verOffset + 1);
            if (browser.toLowerCase() == browser.toUpperCase()) {
                browser = navigator.appName;
            }
        }
        // trim the version string
        if ((ix = version.indexOf(';')) != -1) version = version.substring(0, ix);
        if ((ix = version.indexOf(' ')) != -1) version = version.substring(0, ix);
        if ((ix = version.indexOf(')')) != -1) version = version.substring(0, ix);

        majorVersion = parseInt('' + version, 10);
        if (isNaN(majorVersion)) {
            version = '' + parseFloat(navigator.appVersion);
            majorVersion = parseInt(navigator.appVersion, 10);
        }

        // mobile version
        var mobile = /Mobile|mini|Fennec|Android|iP(ad|od|hone)/.test(nVer);

        // cookie
        var cookieEnabled = (navigator.cookieEnabled) ? true : false;

        if (typeof navigator.cookieEnabled == 'undefined' && !cookieEnabled) {
            document.cookie = 'testcookie';
            cookieEnabled = (document.cookie.indexOf('testcookie') != -1) ? true : false;
        }

        // system
        var os = unknown;
        var clientStrings = [
            {s:'Windows 3.11', r:/Win16/},
            {s:'Windows 95', r:/(Windows 95|Win95|Windows_95)/},
            {s:'Windows ME', r:/(Win 9x 4.90|Windows ME)/},
            {s:'Windows 98', r:/(Windows 98|Win98)/},
            {s:'Windows CE', r:/Windows CE/},
            {s:'Windows 2000', r:/(Windows NT 5.0|Windows 2000)/},
            {s:'Windows XP', r:/(Windows NT 5.1|Windows XP)/},
            {s:'Windows Server 2003', r:/Windows NT 5.2/},
            {s:'Windows Vista', r:/Windows NT 6.0/},
            {s:'Windows 7', r:/(Windows 7|Windows NT 6.1)/},
            {s:'Windows 8.1', r:/(Windows 8.1|Windows NT 6.3)/},
            {s:'Windows 8', r:/(Windows 8|Windows NT 6.2)/},
            {s:'Windows 10', r:/(Windows 10|Windows NT 10.0)/},
            {s:'Windows NT 4.0', r:/(Windows NT 4.0|WinNT4.0|WinNT|Windows NT)/},
            {s:'Windows ME', r:/Windows ME/},
            {s:'Android', r:/Android/},
            {s:'Open BSD', r:/OpenBSD/},
            {s:'Sun OS', r:/SunOS/},
            {s:'Linux', r:/(Linux|X11)/},
            {s:'iOS', r:/(iPhone|iPad|iPod)/},
            {s:'Mac OS X', r:/Mac OS X/},
            {s:'Mac OS', r:/(MacPPC|MacIntel|Mac_PowerPC|Macintosh)/},
            {s:'QNX', r:/QNX/},
            {s:'UNIX', r:/UNIX/},
            {s:'BeOS', r:/BeOS/},
            {s:'OS/2', r:/OS\/2/},
            {s:'Search Bot', r:/(nuhk|Googlebot|Yammybot|Openbot|Slurp|MSNBot|Ask Jeeves\/Teoma|ia_archiver)/}
        ];
        for (var id in clientStrings) {
            var cs = clientStrings[id];
            if (cs.r.test(nAgt)) {
                os = cs.s;
                break;
            }
        }

        var osVersion = unknown;

        if (/Windows/.test(os)) {
            osVersion = /Windows (.*)/.exec(os)[1];
            os = 'Windows';
        }

        switch (os) {
            case 'Mac OS X':
                osVersion = /Mac OS X (10[\.\_\d]+)/.exec(nAgt)[1];
                break;

            case 'Android':
                osVersion = /Android ([\.\_\d]+)/.exec(nAgt)[1];
                break;

            case 'iOS':
                osVersion = /OS (\d+)_(\d+)_?(\d+)?/.exec(nVer);
                osVersion = osVersion[1] + '.' + osVersion[2] + '.' + (osVersion[3] | 0);
                break;
        }
        var flashVersion = 'no check';
        if (typeof swfobject != 'undefined') {
            var fv = swfobject.getFlashPlayerVersion();
            if (fv.major > 0) {
                flashVersion = fv.major + '.' + fv.minor + ' r' + fv.release;
            }
            else  {
                flashVersion = unknown;
            }
        }
        // Using Storage
        var localStore = window.localStorage;
        var sessionStore = window.sessionStorage;
        var globalStore = window.globalStorage;

        return [os, osVersion, browser, version, mobile, cookieEnabled, flashVersion, localStore, sessionStore, globalStore];
    }

    // Check AdBlock
    function checkAdBlock(){
        var ads = document.createElement("div");
        ads.setAttribute("id", "ads");
        try {
            // body may not exist, that's why we need try/catch
            document.body.appendChild(ads);
            return document.getElementById("ads") ? false : true;
        } catch (e) {
            return false;
        }
    }

    // Insert IP addresses into the page
    getIPs(function(ip){
        var li = document.createElement("li");
        li.textContent = ip;

        // LAN IPs
        if (ip.match(/^(192\.168\.|169\.254\.|10\.|172\.(1[6-9]|2\d|3[01]))/))
            document.getElementsByTagName("ul")[0].appendChild(li);

        // Assume the rest are WAN IPs
        else
            document.getElementsByTagName("ul")[1].appendChild(li);
    });

    Information = checks();
    document.write('Your OS is : <b>' + Information[0] + ' ' + Information[1] + '</b></br>');
    document.write('Your UserAgent is : <b>' + checkUA() + '</b></br>');
    document.write('Your browser is : <b>' + Information[2] + ' ' + Information[3] + '</b></br>');
    document.write('Cookie is enabled : <b>' + Information[5] + '</b></br>');
    document.write('Your actual screen size is : <b>' + checkScreenActual() + '</b></br>');
    document.write('Your usable screen size is : <b>' + checkScreenUsable() + '</b></br>');
    document.write('Your Flash version is : <b>' + Information[6] + '</b></br>');
    if( checkDNT()==true ){
        document.write("<b>Do Not Track (DNT)</b> is enabled!</br>");
    }else{
        document.write("<b>Do Not Track (DNT)</b> is disabled!</br>");
    }
    if( Information[4]==false ){
        document.write("You are most probably <b>not using</b> a mobile device</b></br>");
    }else{
        document.write("You are most probably <b>using</b> a mobile device</b></br>");
    }
    document.write('Local Storage : <b>' + !!Information[7] + '</b></br>');
    document.write('Session Storage : <b>'+ !!Information[8] + '</b></br>');
    document.write('Glocal Storage : <b>' + !!Information[9] + '</b></br>');
    document.write('IndexedDB : <b>' + !!checkIndexedDB() + '</b></br>');
    document.write('CPU Class : <b>' + checkCPUClass() + '</b></br>');
    document.write('Date : <b>' + checkDateTime() + '</b></br>');
    document.write('Referrer : <b>' + checkReferrer() + '</b></br>');
    document.write('AdBlock enabled : <b>' + checkAdBlock() + '</b></br>');

    document.write("<h4>The following are the plugins that your browser used.</h4>");
    for (i = 0; i < navigator.plugins.length; i++) {
        document.writeln("Name: <b>" + navigator.plugins[i].name + "</b><BR>" + "Filename: " + navigator.plugins[i].filename + "<BR>" + "Description: " + navigator.plugins[i].description + "<BR>");
        /*
        Enable the following code if we want information about mimetype.

        for (j = 0; j < navigator.plugins[i].length; j++) {
            var mimetype = navigator.plugins[i][j];
            document.writeln("MIME type " + (j + 1) + ": " + mimetype.type + ": " + mimetype.description + "<BR>");
        }
        document.writeln("<BR>");
        */
    }
</script>
</body>
</html>