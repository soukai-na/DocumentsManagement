<!DOCTYPE html>
<html>

<head>
    <title>Test Scan</title>
    <script type="text/javascript" src="Resources/dynamsoft.webtwain.initiate.js"></script>
    <script type="text/javascript" src="Resources/dynamsoft.webtwain.config.js"></script>
    
</head>

<body>
    
    <input type="button" value="Scan Image" onclick="acquireImage();" />
    <input id="btnUpload" type="button" value="Upload Image" onclick="upload()">

    <!-- dwtcontrolContainer is the default div id for Dynamic Web TWAIN control.
    If you need to rename the id, you should also change the id in the dynamsoft.webtwain.config.js accordingly. -->
    <div id="dwtcontrolContainer"></div>

    <script type="text/javascript">
        var DWObject;
        Dynamsoft.DWT.Containers = [{
            ContainerId: 'dwtcontrolContainer',
            Width: '480px',
            Height: '640px'
        }];
        Dynamsoft.DWT.RegisterEvent('OnWebTwainReady', Dynamsoft_OnReady);
        Dynamsoft.DWT.ProductKey = "t00996QAAABka9dMtCFIeVd8L7lVynzSThlm8edt5d5HMQz4KO6jnypgxhPSDMJqTO0DIF5mVEt5rloO1POlsMAY9bXUzigeBfSu+0Dg1R9QIeudo9jDWjacwRehGi4ImeADaXi/Q";
        Dynamsoft.DWT.Load();
        function Dynamsoft_OnReady() {
            DWObject = Dynamsoft.DWT.GetWebTwain('dwtcontrolContainer');
            var token = document.querySelector("meta[name='_token']").getAttribute("content");
            DWObject.SetHTTPFormField('_token', token);
        }

        

        function acquireImage() {
            if (DWObject) {
                DWObject.IfShowUI = false;
                DWObject.IfDisableSourceAfterAcquire = true; 
                DWObject.SelectSource(); 
                DWObject.OpenSource
                DWObject.AcquireImage();
            }
        }

        function upload() {
            var OnSuccess = function(httpResponse) {
                alert("Succesfully uploaded");
            };

            var OnFailure = function(errorCode, errorString, httpResponse) {
                alert(httpResponse);
            };

            var date = new Date();
            DWObject.HTTPUploadThroughPostEx(
                "{{ route('documents.store', 8) }}",
                DWObject.CurrentImageIndexInBuffer,
                '',
                date.getTime() + ".jpg",
                1, // JPEG
                OnSuccess, OnFailure
            );
        }
    </script>
</body>

</html>