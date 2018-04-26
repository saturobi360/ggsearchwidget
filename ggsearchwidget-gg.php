<?php
$file = file_get_contents('http://diafirearms.azurewebsites.net/api/FirearmManufacturers/strippedlist', true);
$file = str_replace('"', '', $file);
$file = str_replace('[', '', $file);
$file = str_replace(']', '', $file);
$a1 = explode(',',$file);
//print_r($a1);

?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Oswald:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="style.min.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script>
      $(document).ready(function() {
        $("p").click(function() {
          $(this).hide();
        });
      });

    </script>
    <script type="text/javascript">
      function goToNewPage() {
        var url = document.getElementById('firearminterest').value;
        if (url != 'none') {
          window.location = url;
        }
      }

    </script>
    
    <!--- This initializes Google tag  --->
    <script type="text/javascript">
        // set global variable if not already set
        var googletag = googletag || {};
        googletag.cmd = googletag.cmd || [];
        // load asynchronously the GPT JavaScript library used by DFP,
        // using SSL/HTTPS if necessary
        (function() {
            var gads   = document.createElement('script');
            gads.async = true;
            gads.type  = 'text/javascript';
            var useSSL = 'https:' === document.location.protocol;
            gads.src = (useSSL ? 'https:' : 'http:') + '//www.googletagservices.com/tag/js/gpt.js';
            var node =document.getElementsByTagName('script')[0];
            node.parentNode.insertBefore(gads, node);
        })();
    </script>

    <script type="text/javascript">
        // can be moved as well in the body
        // if using async mode, wrap all the javascript into googletag.cmd.push!
        googletag.cmd.push(function() {
            // set page-level attributes for ad slots that serve AdSense
            googletag.pubads().set("adsense_background_color", "FFFFFF");
            //googletag.pubads().setTargeting("topic","firearm");
            // enables Single Request Architecture (SRA)
            googletag.pubads().enableSingleRequest();
            // Disable initial load, we will use refresh() to fetch ads.
            // Calling this function means that display() calls just
            // register the slot as ready, but do not fetch ads for it.
            googletag.pubads().disableInitialLoad();
            // Collapses empty div elements on a page when there is no ad content to display.
            googletag.pubads().collapseEmptyDivs();
            // Enables all GPT services that have been defined for ad slots on the page.
            googletag.enableServices();
        });
    </script>
  </head>

  <body>

    <form action="https://www.gungenius.com/search?" target="_blank">
      <div class="widget">
        <div class="header">
          <h2>CHOOSE A FIREARM</h2>
          <div class="powered-by">
            <span>Powered by</span> <span><a href="http://gungenius.com">GunGenius.com</a></span>
          </div>
        </div>
        <div id="manufacturer-container" class="selectdiv selectdiv-empty">
          <label>
                <select id="manufacturer-dropdown" name="manufacturer" style="color:#000; border: 1px solid #000"; class="custom-select full-width">
					<option value="" style="color:#000";>Manufacturer</option>
<?php
foreach($a1 as $a2) { 
	if($a2 == 'Unknown'){
	}
	else {
	?>
	<option value="<?php echo $a2; ?>" style="color:#000";><?php echo $a2; ?></option>
	<?php
}
}
?>
                    
                </select>
            </label>
        </div>
        <script>
          $(document).on("change", "#manufacturer-dropdown", function() {
            $(".centered-text").html("<button class='research-button' style='background-color:#f38131; border:none; color:#fff; cursor: pointer;' id='research-button'>RESEARCH</button>");
            var siteId = this.value;
            //alert(siteId);
            $.ajax({
              method: "POST",
              url: 'caliber.php',
              data: {
                manufacturer: siteId
              },
              success: function(data) {
                //alert(data);
                $("#calibergauge-container > label").html(data);

              }
            });
          });

        </script>
        <div id="calibergauge-container" class="selectdiv selectdiv-empty">
          <label>
                <select id="calibergauge-dropdown" disabled="disabled" name="caliber" class="custom-select full-width">
                    <option value="">Caliber/Gauge</option>
                </select>
            </label>
        </div>
        <div class="centered-text">
          <button class="research-button" id="research-button" disabled="disabled">
                RESEARCH
            </button>
        </div>
        <div class="or oswald-font">
          OR
        </div>
      </div>
    </form>
    <div id="firearminterest-container" class="selectdiv selectdiv-filled">
      <label>
                <select name="firearminterest" id="firearminterest" accesskey="target" onchange="goToNewPage()"; class="custom-select full-width">
                    <option value='none' selected>Select Firearm by Interest</option>
                    <option value="https://www.gungenius.com/audience/shooting">Shooting</option>
                    <option value="https://www.gungenius.com/audience/personal_protection">Personal Protection</option>
                    <option value="https://www.gungenius.com/audience/hunter">Hunter</option>
                    <option value="https://www.gungenius.com/audience/prepper">Prepper</option>
                    <option value="https://www.gungenius.com/audience/leo_military_tactical">Leo/Military/Tactical</option>
                    <option value="https://www.gungenius.com/audience/collectors">Collectors</option>
                    <option value="https://www.gungenius.com/audience/modern_sporting_arms">Modern Sporting Arms</option>
                </select>
            </label>
    </div>
    
    <div id="div-gpt-ad-1524583029226-0" class="ad-container"></div>
    
    <script>
        googletag.cmd.push(function() {
            // define slot1
            slot1 = googletag.defineSlot(
                    "/90033693/gungenius/search_widget",
                    [[300, 600], [300, 250]],
                    "div-gpt-ad-1524583029226-0"
                )
                .addService(googletag.pubads())
                //.setTargeting(
                //    "interests",
                //    ["firearm", "gun"] //Medialodge needs to define what ad targeting keywords they want to use
                //);
            // prerender the slot but don't display it because of disableInitialLoad()
            googletag.display("div-gpt-ad-1524583029226-0");            
            
            // add event to sign the slot as redered or not
            googletag.pubads().addEventListener('slotRenderEnded', function(event) {
                if (event.slot === slot1) {
                    // do something related to the slot
                }
            });
            
            // refresh all container ads and show them
            // very important to call refresh with an array to avoid 
            // multiple callback to the registered event 
            googletag.pubads().refresh([slot1]);
        });
	</script>   
    
  </body>
  </html>
