    <?php if ( ! defined( 'ABSPATH' ) ) exit;
      $pbPP_imgFolderURL = ULPB_PLUGIN_URL.'/images/templates/thumbs/';

      if (is_plugin_active( 'page-builder-add-free-templates-pack/page-builder-add-templates-pack-one.php' ) ) {
        echo "<style> .free-temps-link{ display:none !important;} </style>";
      }
     ?>

    <div id="tab2" class="tab">
      <div id='templatesInstallDiv' class="templatesInstallDivOne"> <i class='fa fa-circle-o-notch'></i> Get All These Templates : <a href='https://pluginops.com/page-builder/?ref=templates' target='_blank'>Unlock Premium Templates</a>
        <!--
        <a class="free-temps-link" href="https://pluginops.com/subscribe-to-our-email-list/"  target='_blank' style="float: right ; font-size: 14px; background: #868686; border-radius: 5px; color: #fff;!important ">Subscribe To Get Free Templates</a> -->
      </div>

      <div style="float: right; margin: 10px 30px; font-size: 18px; color: #7d7d7d;">
        <label>Filter Templates </label>
        <select class="templatesFilterSelector">
          <option value="All">All</option>
          <option value="Lead Generation">Lead Generation</option>
          <option value="Click Through">Click Through</option>
          <option value="Sales">Sales</option>
          <option value="Thank You">Thank You</option>
          <option value="Webinar">Webinar</option>
          <option value="Coming Soon">Coming Soon</option>
          <option value="Home Page">Home Page</option>
        </select>
      </div>

      <?php
        $proTempsLoaded = false;
        if (is_plugin_active( 'PluginOps-Extensions-Pack/extension-pack.php' )  ) {
          if (function_exists('ulpb_available_pro_templates') ) {
            ulpb_available_pro_templates($pbPP_imgFolderURL);
            $proTempsLoaded = true;
          }
        }
        if($proTempsLoaded == false) {
          ?>
          <div class="tabs">
            <ul class="tab-links">
            </ul>
            <div class="tab-content">
              <div id="landingpages" class="tab active">

                <div id="column-1" class="col">
                  <div id="card" class="temp-prev-101 card template-card">
                    <div id="temp-prev-101" class="tempPrev"> <p id="temp-prev-101"><b>Preview</b></p></div>
                      <label for="temp-101"> <img src="<?php echo $pbPP_imgFolderURL.'template-101.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-101.png" class='card-img temp-prev-101'>
                      <p class="card-desc"></p> </label>
                      <input type="radio" class="template_select" id='temp-101' name="template_select" value='tempftp1'>
                      <label for="temp-101"> Select  <b style="color: #4CAF50;">Free</b> </label>
                      <span class="temp-cats-displayed">Home Page</span>
                      <span class="temp-cats-displayed">Free</span>
                  </div>
                  <div id="card" class="temp-prev-102 card template-card">
                    <div id="temp-prev-102" class="tempPrev"> <p id="temp-prev-102"><b>Preview</b></p></div>
                      <label for="temp-102"> <img src="<?php echo $pbPP_imgFolderURL.'template-102.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-102.png" class='card-img temp-prev-102'>
                      <p class="card-desc"></p> </label>
                      <input type="radio" class="template_select" id='temp-102' name="template_select" value='tempftp2'>
                      <label for="temp-102"> Select  <b style="color: #4CAF50;">Free</b> </label>
                      <span class="temp-cats-displayed">Gallery Page</span>
                      <span class="temp-cats-displayed">Free</span>
                  </div>
                  <div id="card" class="temp-prev-103 card template-card">
                    <div id="temp-prev-103" class="tempPrev"> <p id="temp-prev-103"><b>Preview</b></p></div>
                      <label for="temp-103"> <img src="<?php echo $pbPP_imgFolderURL.'template-103.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-103.png" class='card-img temp-prev-103'>
                      <p class="card-desc"></p> </label>
                      <input type="radio" class="template_select" id='temp-103' name="template_select" value='tempftp3'>
                      <label for="temp-103"> Select  <b style="color: #4CAF50;">Free</b> </label>
                      <span class="temp-cats-displayed">Contact Us</span>
                      <span class="temp-cats-displayed">Free</span>
                  </div>
                  <div id="card" class="temp-prev-104 card template-card">
                    <div id="temp-prev-104" class="tempPrev"> <p id="temp-prev-104"><b>Preview</b></p></div>
                      <label for="temp-104"> <img src="<?php echo $pbPP_imgFolderURL.'template-104.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-104.png" class='card-img temp-prev-104'>
                      <p class="card-desc"></p> </label>
                      <input type="radio" class="template_select" id='temp-104' name="template_select" value='tempftp4'>
                      <label for="temp-104"> Select  <b style="color: #4CAF50;">Free</b> </label>
                      <span class="temp-cats-displayed">About Us</span>
                      <span class="temp-cats-displayed">Free</span>
                  </div>

                  <div id="card" class="temp-prev-3 card template-card">
                    <div id="temp-prev-3" class="tempPrev"> <p id="temp-prev-3"><b>Preview</b></p></div>
                      <label for="temp-3"> <img src="<?php echo $pbPP_imgFolderURL.'template-2.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-2.png" class='card-img temp-prev-3'>
                      <p class="card-desc"></p> </label>
                      <input type="radio" class="template_select" id='temp-3' name="template_select" value='temp3'>
                      <label for="temp-3"> Select  <b style="color: #4CAF50;">Free</b> </label>
                      <span class="temp-cats-displayed">Home Page</span>
                      <span class="temp-cats-displayed">Free</span>
                  </div>
                  <div id="card" class="temp-prev-2 card template-card">
                    <div id="temp-prev-2" class="tempPrev"> <p id="temp-prev-2"><b>Preview</b></p></div>
                    <label for="temp-2"> <img src="<?php echo $pbPP_imgFolderURL.'template-1.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-1.png" class='card-img temp-prev-2'>
                    <p class="card-desc"></p> </label>
                    <input type="radio"  class="template_select" id='temp-2' name="template_select" value='temp2'>
                    <label for="temp-2"> Select  <b style="color: #4CAF50;">Free</b> </label>
                    <span class="temp-cats-displayed">Home Page</span>
                    <span class="temp-cats-displayed">Free</span>
                  </div>
                  <div id="card" class="temp-prev-4 card template-card">
                    <div id="temp-prev-4" class="tempPrev"> <p id="temp-prev-4"><b>Preview</b></p></div>
                    <label for="temp-4"> <img src="<?php echo $pbPP_imgFolderURL.'template-4.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-4.png" class='card-img temp-prev-4'>
                    <p class="card-desc"></p> </label>
                    <input type="radio"  class="template_select" id='temp-4' name="template_select" value='temp4'>
                    <label for="temp-4">Select  <b style="color: #4CAF50;">Free</b> </label>
                    <span class="temp-cats-displayed">Home Page</span>
                    <span class="temp-cats-displayed">Free</span>
                  </div>
                  <div id="card" class="temp-prev-9 card template-card">
                    <div id="temp-prev-9" class="tempPrev"> <p id="temp-prev-9"><b>Preview</b></p></div>
                    <label for="temp-9"> <img src="<?php echo $pbPP_imgFolderURL.'template-7.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-7.png" class='card-img temp-prev-9'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" class="template_select" id='temp-9' name="template_select" value='temp9'>
                    <label for="temp-9">Select  <b style="color: #4CAF50;">Free</b> </label>
                    <span class="temp-cats-displayed">Click Through</span>
                    <span class="temp-cats-displayed">Free</span>
                  </div>

                  <!-- Pro Templates -->
                  <div id="card" class="temp-prev-38 card tempPaca template-card">
                    <div id="temp-prev-38" class="tempPrev tempPaca"> <p id="temp-prev-38"><b>Preview</b></p></div>
                      <label for="temp-38"> <img src="<?php echo $pbPP_imgFolderURL.'template-38.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-38.png" class='card-img temp-prev-38'>
                      <p class="card-desc"></p> </label>
                      <input type="radio" disabled="disabled" class="template_select" id='temp-38' name="template_select" value='temp38'>
                      <label for="temp-38"><strike> Select </strike> <b>Pro Only</b> </label>
                      <span class="temp-cats-displayed">Lead Generation</span>
                  </div>
                  <div id="card" class="temp-prev-39 card tempPaca template-card">
                    <div id="temp-prev-39" class="tempPrev tempPaca"> <p id="temp-prev-39"><b>Preview</b></p></div>
                      <label for="temp-39"> <img src="<?php echo $pbPP_imgFolderURL.'template-39.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-39.png" class='card-img temp-prev-39'>
                      <p class="card-desc"></p> </label>
                      <input type="radio" disabled="disabled" class="template_select" id='temp-39' name="template_select" value='temp39'>
                      <label for="temp-39"><strike> Select </strike> <b>Pro Only</b> </label>
                      <span class="temp-cats-displayed">Thank You</span>
                  </div>
                  <div id="card" class="temp-prev-35 card template-card">
                    <div id="temp-prev-35" class="tempPrev"> <p id="temp-prev-35"><b>Preview</b></p></div>
                    <label for="temp-35"> <img src="<?php echo $pbPP_imgFolderURL.'template-35.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-35.png" class='card-img temp-prev-35'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" class="template_select" id='temp-35' name="template_select" value='temp35'>
                    <label for="temp-35">Select  <b style="color: #4CAF50;">Free</b> </label>
                    <span class="temp-cats-displayed">Click Through</span>
                  </div>
                  <div id="card" class="temp-prev-36 card tempPaca template-card">
                    <div id="temp-prev-36" class="tempPrev tempPaca"> <p id="temp-prev-36"><b>Preview</b></p></div>
                      <label for="temp-36"> <img src="<?php echo $pbPP_imgFolderURL.'template-36.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-36.png" class='card-img temp-prev-36'>
                      <p class="card-desc"></p> </label>
                      <input type="radio" disabled="disabled" class="template_select" id='temp-36' name="template_select" value='temp36'>
                      <label for="temp-36"><strike> Select </strike> <b>Pro Only</b> </label>
                      <span class="temp-cats-displayed">Lead Generation</span>
                  </div>
                  <div id="card" class="temp-prev-37 card tempPaca template-card">
                    <div id="temp-prev-37" class="tempPrev tempPaca"> <p id="temp-prev-37"><b>Preview</b></p></div>
                      <label for="temp-37"> <img src="<?php echo $pbPP_imgFolderURL.'template-37.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-37.png" class='card-img temp-prev-37'>
                      <p class="card-desc"></p> </label>
                      <input type="radio" disabled="disabled" class="template_select" id='temp-37' name="template_select" value='temp37'>
                      <label for="temp-37"><strike> Select </strike> <b>Pro Only</b> </label>
                      <span class="temp-cats-displayed">Thank You</span>
                  </div>
                  <div id="card" class="temp-prev-31 card tempPaca template-card">
                    <div id="temp-prev-31" class="tempPrev tempPaca"> <p id="temp-prev-31"><b>Preview</b></p></div>
                      <label for="temp-31"> <img src="<?php echo $pbPP_imgFolderURL.'template-31.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-31.png" class='card-img temp-prev-31'>
                      <p class="card-desc"></p> </label>
                      <input type="radio" disabled="disabled" class="template_select" id='temp-31' name="template_select" value='temp31'>
                      <label for="temp-31"><strike> Select </strike> <b>Pro Only</b> </label>
                      <span class="temp-cats-displayed">Lead Generation</span>
                      <span class="temp-cats-displayed">Coming Soon</span>
                  </div>
                  <div id="card" class="temp-prev-32 card tempPaca template-card">
                    <div id="temp-prev-32" class="tempPrev tempPaca"> <p id="temp-prev-32"><b>Preview</b></p></div>
                      <label for="temp-32"> <img src="<?php echo $pbPP_imgFolderURL.'template-32.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-32.png" class='card-img temp-prev-32'>
                      <p class="card-desc"></p> </label>
                      <input type="radio" disabled="disabled" class="template_select" id='temp-32' name="template_select" value='temp32'>
                      <label for="temp-32"><strike> Select </strike> <b>Pro Only</b> </label>
                      <span class="temp-cats-displayed">Lead Generation</span>
                      <span class="temp-cats-displayed">Home Page</span>
                  </div>
                  <div id="card" class="temp-prev-109 card tempPaca template-card">
                    <div id="temp-prev-109" class="tempPrev tempPaca"> <p id="temp-prev-109"><b>Preview</b></p></div>
                      <label for="temp-109"> <img src="<?php echo $pbPP_imgFolderURL.'template-109.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-109.png" class='card-img temp-prev-109'>
                      <p class="card-desc"></p> </label>
                      <input type="radio" disabled="disabled" class="template_select" id='temp-109' name="template_select" value='temp109'>
                      <label for="temp-109"><strike> Select </strike> <b>Pro Only</b> </label>
                      <span class="temp-cats-displayed">Lead Generation</span>
                      <span class="temp-cats-displayed">Sales</span>
                  </div>
                  <div id="card" class="temp-prev-108 card tempPaca template-card">
                    <div id="temp-prev-108" class="tempPrev tempPaca"> <p id="temp-prev-108"><b>Preview</b></p></div>
                      <label for="temp-108"> <img src="<?php echo $pbPP_imgFolderURL.'template-108.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-108.png" class='card-img temp-prev-108'>
                      <p class="card-desc"></p> </label>
                      <input type="radio" disabled="disabled" class="template_select" id='temp-108' name="template_select" value='temp108'>
                      <label for="temp-108"><strike> Select </strike> <b>Pro Only</b> </label>
                      <span class="temp-cats-displayed">Lead Generation</span>
                  </div>
                  <div id="card" class="temp-prev-107 card tempPaca template-card">
                    <div id="temp-prev-107" class="tempPrev tempPaca"> <p id="temp-prev-107"><b>Preview</b></p></div>
                      <label for="temp-107"> <img src="<?php echo $pbPP_imgFolderURL.'template-107.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-107.png" class='card-img temp-prev-107'>
                      <p class="card-desc"></p> </label>
                      <input type="radio" disabled="disabled" class="template_select" id='temp-107' name="template_select" value='temp107'>
                      <label for="temp-107"><strike> Select </strike> <b>Pro Only</b> </label>
                      <span class="temp-cats-displayed">Click Through</span>
                      <span class="temp-cats-displayed">Sales</span>
                  </div>
                  <div id="card" class="temp-prev-105 card template-card">
                    <div id="temp-prev-105" class="tempPrev"> <p id="temp-prev-105"><b>Preview</b></p></div>
                    <label for="temp-105"> <img src="<?php echo $pbPP_imgFolderURL.'template-105.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-105.png" class='card-img temp-prev-105'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" class="template_select" id='temp-105' name="template_select" value='temp105'>
                    <label for="temp-105">Select  <b style="color: #4CAF50;">Free</b> </label>
                    <span class="temp-cats-displayed">Click Through</span>
                    <span class="temp-cats-displayed">Sales</span>
                    <span class="temp-cats-displayed">Free</span>
                  </div>
                  <div id="card" class="temp-prev-34 card template-card">
                    <div id="temp-prev-34" class="tempPrev"> <p id="temp-prev-34"><b>Preview</b></p></div>
                    <label for="temp-34"> <img src="<?php echo $pbPP_imgFolderURL.'template-34.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-34.png" class='card-img temp-prev-34'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" class="template_select" id='temp-34' name="template_select" value='temp34'>
                    <label for="temp-34">Select  <b style="color: #4CAF50;">Free</b> </label>
                    <span class="temp-cats-displayed">Lead Generation</span>
                    <span class="temp-cats-displayed">Free</span>
                  </div>
                  <div id="card" class="temp-prev-33 card tempPaca template-card">
                    <div id="temp-prev-33" class="tempPrev tempPaca"> <p id="temp-prev-33"><b>Preview</b></p></div>
                      <label for="temp-33"> <img src="<?php echo $pbPP_imgFolderURL.'template-33.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-33.png" class='card-img temp-prev-33'>
                      <p class="card-desc"></p> </label>
                      <input type="radio" disabled="disabled" class="template_select" id='temp-33' name="template_select" value='temp33'>
                      <label for="temp-33"><strike> Select </strike> <b>Pro Only</b> </label>
                      <span class="temp-cats-displayed">Lead Generation</span>
                      <span class="temp-cats-displayed">Thank You</span>
                  </div>
                  <div id="card" class="temp-prev-30 card tempPaca template-card">
                    <div id="temp-prev-30" class="tempPrev tempPaca"> <p id="temp-prev-30"><b>Preview</b></p></div>
                    <label for="temp-30"> <img src="<?php echo $pbPP_imgFolderURL.'template-30.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-30.png" class='card-img temp-prev-30'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-30' name="template_select" value='temp30'>
                    <label for="temp-30"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Sales</span>
                    <span class="temp-cats-displayed">Lead Generation</span>
                  </div>
                  <div id="card" class="temp-prev-29 card tempPaca template-card">
                    <div id="temp-prev-29" class="tempPrev tempPaca"> <p id="temp-prev-29"><b>Preview</b></p></div>
                    <label for="temp-29"> <img src="<?php echo $pbPP_imgFolderURL.'template-29.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-29.png" class='card-img temp-prev-29'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-29' name="template_select" value='temp29'>
                    <label for="temp-29"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Home Page</span>
                    <span class="temp-cats-displayed">Click Through</span>
                  </div>
                  <div id="card" class="temp-prev-28 card tempPaca template-card">
                    <div id="temp-prev-28" class="tempPrev tempPaca"> <p id="temp-prev-28"><b>Preview</b></p></div>
                    <label for="temp-28"> <img src="<?php echo $pbPP_imgFolderURL.'template-28.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-28.png" class='card-img temp-prev-28'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-28' name="template_select" value='temp28'>
                    <label for="temp-28"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Home Page</span>
                    <span class="temp-cats-displayed">Click Through</span>
                  </div>
                  <div id="card" class="temp-prev-27 card tempPaca template-card">
                    <div id="temp-prev-27" class="tempPrev tempPaca"> <p id="temp-prev-27"><b>Preview</b></p></div>
                    <label for="temp-27"> <img src="<?php echo $pbPP_imgFolderURL.'template-27.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-27.png" class='card-img temp-prev-27'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-27' name="template_select" value='temp27'>
                    <label for="temp-27"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Click Through</span>
                    <span class="temp-cats-displayed">Sales</span>
                    <span class="temp-cats-displayed">Lead Generation</span>
                  </div>
                  <div id="card" class="temp-prev-24 card tempPaca template-card">
                    <div id="temp-prev-24" class="tempPrev tempPaca"> <p id="temp-prev-24"><b>Preview</b></p></div>
                    <label for="temp-24"> <img src="<?php echo $pbPP_imgFolderURL.'template-24.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-24.png" class='card-img temp-prev-24'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-24' name="template_select" value='temp24'>
                    <label for="temp-24"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Sales</span>
                  </div>
                  <div id="card" class="temp-prev-25 card tempPaca template-card">
                  <div id="temp-prev-25" class="tempPrev tempPaca"> <p id="temp-prev-25"><b>Preview</b></p></div>
                    <label for="temp-25"> <img src="<?php echo $pbPP_imgFolderURL.'template-25.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-25.png" class='card-img temp-prev-25'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-25' name="template_select" value='temp25'>
                    <label for="temp-25"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Lead Generation</span>
                    <span class="temp-cats-displayed">Home Page</span>
                  </div>
                  <div id="card" class="temp-prev-26 card tempPaca template-card">
                  <div id="temp-prev-26" class="tempPrev tempPaca"> <p id="temp-prev-26"><b>Preview</b></p></div>
                    <label for="temp-26"> <img src="<?php echo $pbPP_imgFolderURL.'template-26.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-26.png" class='card-img temp-prev-26'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-26' name="template_select" value='temp26'>
                    <label for="temp-26"><strike> Select </strike> <b>Pro Only</b></label>
                  </div>
                  <div id="card" class="temp-prev-10 card tempPaca template-card">
                  <div id="temp-prev-10" class="tempPrev tempPaca"> <p id="temp-prev-10"><b>Preview</b></p></div>
                    <label for="temp-10"> <img src="<?php echo $pbPP_imgFolderURL.'template-11.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-11.png" class='card-img temp-prev-10'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-10' name="template_select" value='temp10'>
                    <label for="temp-10"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Lead Generation</span>
                    <span class="temp-cats-displayed">Click Through</span>
                  </div>
                  <div id="card" class="temp-prev-11 card tempPaca template-card">
                  <div id="temp-prev-11" class="tempPrev tempPaca"> <p id="temp-prev-11"><b>Preview</b></p></div>
                    <label for="temp-11"> <img src="<?php echo $pbPP_imgFolderURL.'template-12.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-12.png" class='card-img temp-prev-11'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-11' name="template_select" value='temp11'>
                    <label for="temp-11"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Home Page</span>
                    <span class="temp-cats-displayed">Lead Generation</span>
                  </div>
                  <div id="card" class="temp-prev-13 card tempPaca template-card">
                  <div id="temp-prev-13" class="tempPrev tempPaca"> <p id="temp-prev-13"><b>Preview</b></p></div>
                    <label for="temp-13"> <img src="<?php echo $pbPP_imgFolderURL.'template-14.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-14.png" class='card-img temp-prev-13'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-13' name="template_select" value='temp13'>
                    <label for="temp-13"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Click Through</span>
                    <span class="temp-cats-displayed">Webinar</span>
                  </div>
                  <div id="card" class="temp-prev-16 card tempPaca template-card">
                    <div id="temp-prev-16" class="tempPrev tempPaca"> <p id="temp-prev-16"><b>Preview</b></p></div>
                    <label for="temp-16"> <img src="<?php echo $pbPP_imgFolderURL.'template-17.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-17.png" class='card-img temp-prev-16'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-16' name="template_select" value='temp16'>
                    <label for="temp-16"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Click Through</span>
                    <span class="temp-cats-displayed">Sales</span>
                  </div>
                  <div id="card" class="temp-prev-18 card tempPaca template-card">
                  <div id="temp-prev-18" class="tempPrev tempPaca"> <p id="temp-prev-18"><b>Preview</b></p></div>
                    <label for="temp-18"> <img src="<?php echo $pbPP_imgFolderURL.'template-18.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-18.png" class='card-img temp-prev-18'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-18' name="template_select" value='temp18'>
                    <label for="temp-18"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Click Through</span>
                    <span class="temp-cats-displayed">Home Page</span>
                  </div>
                  <div id="card" class="temp-prev-19 card tempPaca template-card">
                  <div id="temp-prev-19" class="tempPrev tempPaca"> <p id="temp-prev-19"><b>Preview</b></p></div>
                    <label for="temp-19"> <img src="<?php echo $pbPP_imgFolderURL.'template-19.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-19.png" class='card-img temp-prev-19'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-19' name="template_select" value='temp19'>
                    <label for="temp-19"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Lead Generation</span>
                  </div>
                  <div id="card" class="temp-prev-20 card tempPaca template-card">
                    <div id="temp-prev-20" class="tempPrev tempPaca"> <p id="temp-prev-20"><b>Preview</b></p></div>
                    <label for="temp-20"> <img src="<?php echo $pbPP_imgFolderURL.'template-20.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-20.png" class='card-img temp-prev-20'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-20' name="template_select" value='temp20'>
                    <label for="temp-20"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Home Page</span>
                    <span class="temp-cats-displayed">Click Through</span>
                  </div>
                  <div id="card" class="temp-prev-22 card tempPaca template-card">
                    <div id="temp-prev-22" class="tempPrev tempPaca"> <p id="temp-prev-22"><b>Preview</b></p></div>
                    <label for="temp-22"> <img src="<?php echo $pbPP_imgFolderURL.'template-22.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-22.png" class='card-img temp-prev-22'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-22' name="template_select" value='temp22'>
                    <label for="temp-22"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Home Page</span>
                    <span class="temp-cats-displayed">Sales</span>
                    <span class="temp-cats-displayed">Lead Generation</span>
                  </div>
                  <div id="card" class="temp-prev-23 card tempPaca template-card">
                    <div id="temp-prev-23" class="tempPrev tempPaca"> <p id="temp-prev-23"><b>Preview</b></p></div>
                    <label for="temp-23"> <img src="<?php echo $pbPP_imgFolderURL.'template-23.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-23.png" class='card-img temp-prev-23'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-23' name="template_select" value='temp23'>
                    <label for="temp-23"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Click Through</span>
                    <span class="temp-cats-displayed">Sales</span>
                  </div>


                  <div id="card" class="temp-prev-1 card tempPaca template-card">
                    <div id="temp-prev-1" class="tempPrev tempPaca"> <p id="temp-prev-1"><b>Preview</b></p></div>
                    <label for="temp-1"> <img src="<?php echo $pbPP_imgFolderURL.'template-5.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-5.png" class='card-img temp-prev-1'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-1' name="template_select" value='temp1'>
                    <label for="temp-1"><strike> Select </strike> <b>Pro Only</b></label>
                  </div>
                  <div id="card" class="temp-prev-5 card tempPaca template-card">
                    <div id="temp-prev-5" class="tempPrev tempPaca"> <p id="temp-prev-5"><b>Preview</b></p></div>
                    <label for="temp-5"> <img src="<?php echo $pbPP_imgFolderURL.'template-3.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-3.png" class='card-img temp-prev-5'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-5' name="template_select" value='temp5'>
                    <label for="temp-5"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Lead Generation</span>
                  </div>
                  <div id="card" class="temp-prev-6 card tempPaca template-card">
                    <div id="temp-prev-6" class="tempPrev tempPaca"> <p id="temp-prev-6"><b>Preview</b></p></div>
                    <label for="temp-6"> <img src="<?php echo $pbPP_imgFolderURL.'template-10.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-10.png" class='card-img temp-prev-6'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-6' name="template_select" value='temp6'>
                    <label for="temp-6"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Lead Generation</span>
                  </div>
                  <div id="card" class="temp-prev-7 card tempPaca template-card">
                    <div id="temp-prev-7" class="tempPrev tempPaca"> <p id="temp-prev-7"><b>Preview</b></p></div>
                    <label for="temp-7"> <img src="<?php echo $pbPP_imgFolderURL.'template-6.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-6.png" class='card-img temp-prev-7'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-7' name="template_select" value='temp7'>
                    <label for="temp-7"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Click Through</span>
                    <span class="temp-cats-displayed">Sales</span>
                  </div>
                  <div id="card" class="temp-prev-8 card tempPaca template-card">
                    <div id="temp-prev-8" class="tempPrev tempPaca"> <p id="temp-prev-8"><b>Preview</b></p></div>
                    <label for="temp-8"> <img src="<?php echo $pbPP_imgFolderURL.'template-8.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-8.png" class='card-img temp-prev-8'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-8' name="template_select" value='temp8'>
                    <label for="temp-8"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Click Through</span>
                    <span class="temp-cats-displayed">Lead Generation</span>
                  </div>
                  <div id="card" class="temp-prev-12 card tempPaca template-card">
                    <div id="temp-prev-12" class="tempPrev tempPaca"> <p id="temp-prev-12"><b>Preview</b></p></div>
                    <label for="temp-12"> <img src="<?php echo $pbPP_imgFolderURL.'template-13.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-13.png" class='card-img temp-prev-12'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-12' name="template_select" value='temp12'>
                    <label for="temp-12"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Click Through</span>
                    <span class="temp-cats-displayed">Lead Generation</span>
                  </div>
                  <div id="card" class="temp-prev-14 card tempPaca template-card">
                    <div id="temp-prev-14" class="tempPrev tempPaca"> <p id="temp-prev-14"><b>Preview</b></p></div>
                    <label for="temp-14"> <img src="<?php echo $pbPP_imgFolderURL.'template-15.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-15.png" class='card-img temp-prev-14'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-14' name="template_select" value='temp14'>
                    <label for="temp-14"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Home Page</span>
                  </div>
                  <div id="card" class="temp-prev-15 card tempPaca template-card">
                    <div id="temp-prev-15" class="tempPrev tempPaca"> <p id="temp-prev-15"><b>Preview</b></p></div>
                    <label for="temp-15"> <img src="<?php echo $pbPP_imgFolderURL.'template-16.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-16.png" class='card-img temp-prev-15'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-15' name="template_select" value='temp15'>
                    <label for="temp-15"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Thank You</span>
                  </div>
                  <div id="card" class="temp-prev-21 card tempPaca template-card">
                    <div id="temp-prev-21" class="tempPrev tempPaca"> <p id="temp-prev-21"><b>Preview</b></p></div>
                    <label for="temp-21"> <img src="<?php echo $pbPP_imgFolderURL.'template-21.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-21.png" class='card-img temp-prev-21'>
                    <p class="card-desc"></p> </label>
                    <input type="radio" disabled="disabled" class="template_select" id='temp-21' name="template_select" value='temp21'>
                    <label for="temp-21"><strike> Select </strike> <b>Pro Only</b></label>
                    <span class="temp-cats-displayed">Home Page</span>
                  </div>
                  <div id="card" class="temp-prev-106 card tempPaca template-card">
                    <div id="temp-prev-106" class="tempPrev tempPaca"> <p id="temp-prev-106"><b>Preview</b></p></div>
                      <label for="temp-106"> <img src="<?php echo $pbPP_imgFolderURL.'template-106.png'; ?>" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-106.png" class='card-img temp-prev-106'>
                      <p class="card-desc"></p> </label>
                      <input type="radio" disabled="disabled" class="template_select" id='temp-106' name="template_select" value='temp106'>
                      <label for="temp-106"><strike> Select </strike> <b>Pro Only</b> </label>
                      <span class="temp-cats-displayed">Lead Generation</span>
                      <span class="temp-cats-displayed">Coming Soon</span>
                  </div>
                </div> 
                
                <br>
              </div>

              <div id="campaign" class="tab">
                
                
              </div>
            </div>
            
          </div>

        <?php
        }
        ?>

      
    </div>

    <span class="temp-cats-displayed">Lead Generation</span>
    <span class="temp-cats-displayed">Click Through</span>
    <span class="temp-cats-displayed">Sales</span>
    <span class="temp-cats-displayed">Thank You</span>
    <span class="temp-cats-displayed">Webinar</span>
    <span class="temp-cats-displayed">Coming Soon</span>
    <span class="temp-cats-displayed">Home Page</span>

    <script type="text/javascript">
      jQuery('.templatesFilterSelector').on('change', function(){
        var WidgetSearchQuery =  jQuery(this).val();
        jQuery('.template-card').hide();
        
        jQuery('.template-card:contains("'+WidgetSearchQuery+'")').show();

        if (WidgetSearchQuery == 'All') {
          jQuery('.template-card').show();
        }

      });
    </script>