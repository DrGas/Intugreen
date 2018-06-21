<?php if ( ! defined( 'ABSPATH' ) ) exit; 
$widgBlockImagesURL = ULPB_PLUGIN_URL.'/images/templates/widgetBlocks/';
?>
<div id="widgBlocksContainer">
    <!-- Append Here -->
</div>





<script type="text/javascript">
    ( function( $ ) {

            <?php 
            if ( is_plugin_active('PluginOps-Extensions-Pack/extension-pack.php') ) {
                echo "  var isPremActive = 'true'; ";
            }else{
                echo " var isPremActive = 'false'; ";
            }
            ?>
        
        $(document).ready(function(){
            var widgBlockNames = {
                1:{
                    tempname : 1,
                    tempType:'wigt-btn-gen',
                    isPro:true,
                },
                2:{
                    tempname : 2,
                    tempType:'wigt-btn-gen',
                    isPro:true,
                },
                3:{
                    tempname : 3,
                    tempType:'wigt-btn-gen',
                    isPro:true,
                },
                4:{
                    tempname : 4,
                    tempType:'wigt-btn-gen',
                    isPro:true,
                },
                5:{
                    tempname : 5,
                    tempType:'wigt-btn-gen',
                    isPro:true,
                },
                6:{
                    tempname : 6,
                    tempType:'wigt-btn-gen',
                    isPro:true,
                },
                7:{
                    tempname : 7,
                    tempType:'wigt-btn-gen',
                    isPro:true,
                },
                8:{
                    tempname : 8,
                    tempType:'wigt-btn-gen',
                    isPro:true,
                },
                9:{
                    tempname : 9,
                    tempType:'wigt-btn-gen',
                    isPro:true,
                },
                10:{
                    tempname : 10,
                    tempType:'wigt-btn-gen',
                    isPro:true,
                },
                11:{
                    tempname : 11,
                    tempType:'wigt-pb-formBuilder',
                    isPro:true,
                },
                12:{
                    tempname : 12,
                    tempType:'wigt-pb-formBuilder',
                    isPro:true,
                },
                13:{
                    tempname : 13,
                    tempType:'wigt-pb-formBuilder',
                    isPro:true,
                },
                14:{
                    tempname : 14,
                    tempType:'wigt-pb-formBuilder',
                    isPro:true,
                },
                15:{
                    tempname : 15,
                    tempType:'wigt-pb-formBuilder',
                    isPro:true,
                },
                16:{
                    tempname : 16,
                    tempType:'wigt-pb-text',
                    isPro:true,
                },
                17:{
                    tempname : 17,
                    tempType:'wigt-pb-text',
                    isPro:true,
                },
                18:{
                    tempname : 18,
                    tempType:'wigt-pb-text',
                    isPro:true,
                },
                19:{
                    tempname : 19,
                    tempType:'wigt-pb-text',
                    isPro:true,
                },
                20:{
                    tempname : 20,
                    tempType:'wigt-pb-text',
                    isPro:true,
                },
                21:{
                    tempname : 21,
                    tempType:'wigt-pb-text',
                    isPro:true,
                },
                22:{
                    tempname : 22,
                    tempType:'wigt-pb-text',
                    isPro:true,
                },
                23:{
                    tempname : 23,
                    tempType:'wigt-pb-formBuilder',
                    isPro:true,
                },
                23:{
                    tempname : 23,
                    tempType:'wigt-pb-formBuilder',
                    isPro:true,
                },
                26:{
                    tempname : 26,
                    tempType:'wigt-pb-countdown',
                    isPro:true,
                },
                27:{
                    tempname : 27,
                    tempType:'wigt-pb-countdown',
                    isPro:true,
                },
                28:{
                    tempname : 28,
                    tempType:'wigt-pb-countdown',
                    isPro:true,
                },
            };
            $.each(widgBlockNames, function(index,val){
                if (val['isPro'] == true  && isPremActive != 'true') {
                    var insertBtn = '<div class="rowBlockProUpdateBtn" data-widgetBlockName="'+'protemp'+'"> Pro <i class="fa fa-ban"></i> </div>';
                }else{
                    var insertBtn = '<div class="widgetBlockUpdateBtn" data-widgetBlockName="'+val['tempname']+'"> Insert <i class="fa fa-download"></i> </div>';
                }

                $('#widgBlocksContainer').append(
                    '<div id="rowBlock" class="rowBlock-'+val['tempname']+' rowBlock template-card widgetblock">'
                        +'<div id="rowBlock-'+val['tempname']+'" class="tempPrev"> <p id="rowBlock-'+val['tempname']+'"><b>Preview</b></p></div>'
                        +'<label for="rowBlock-'+val['tempname']+'"> <img src="<?php echo $widgBlockImagesURL; ?>'+val['tempname']+'.png" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-'+val['tempname']+'.png" class="card-img rowBlock-'+val['tempname']+'">'
                        +'<p class="card-desc"></p> </label>'
                        +insertBtn
                        +'<span class="block-cats-displayed">'+val['tempType']+'</span>'
                    +'</div>'
                );
            });

            jQuery('.rowBlocksFilterSelector').on('change', function(){
                var WidgetSearchQuery =  jQuery(this).val();
                jQuery('.widgetblock').hide();
                
                jQuery('.widgetblock:contains("'+WidgetSearchQuery+'")').show();

                if (WidgetSearchQuery == 'All') {
                  jQuery('.widgetblock').show();
                }
            });

        });
    }( jQuery ) );
</script>




<script type="text/javascript">
    ( function( $ ) {
        $('.widgetBlockUpdateBtn').live('click',function(){
            var templateName = $(this).attr('data-widgetblockname');
            var thisWidgetIndex = pageBuilderApp.currentlyEditedWidgId;
            thisWidgetIndex = parseInt(thisWidgetIndex);
            $('#widgets li:nth-child('+(thisWidgetIndex+1)+')').children().children('.wdt-edit-controls').children('#updateWidgetTemplate').attr('data-selected_widget_template',templateName);
            $('#widgets li:nth-child('+(thisWidgetIndex+1)+')').children().children('.wdt-edit-controls').children('#updateWidgetTemplate').click();
        });
    }( jQuery ) );
</script>