<?php  if ( ! defined( 'ABSPATH' ) ) exit;


for($i = 1; $i <= $columns; $i++) {
      $Columni = 'column'.$i;
      $currentColumn = $row[$Columni];
      
      $columnOptions = $currentColumn['columnOptions'];
      $columnBgColor = $columnOptions['bg_color'];
      $columnMargin = $columnOptions['margin'];
      $columnPadding = $columnOptions['padding'];
      $columnWidth = $columnOptions['width'];
      
      if (isset($columnOptions['columnCSS'])) {
        $columnCSS = $columnOptions['columnCSS'];
      } else{
        $columnCSS = '';
      }

      if (isset($columnOptions['columnCustomClass'])) {
        $columnCustomClass = $columnOptions['columnCustomClass'];
      } else{
        $columnCustomClass = '';
      }

      $colHideOnDesktop = "display:inline-block"; $colHideOnTablet = "display:inline-block"; $colHideOnMobile = "display:inline-block";
      if (isset($columnOptions['colHideOnDesktop']) ) {
        if ($columnOptions['colHideOnDesktop'] == 'hide') {
          $colHideOnDesktop ="display:none";
        }
        if ($columnOptions['colHideOnTablet'] == 'hide') {
          $colHideOnTablet ="display:none !important;";
        }
        if ($columnOptions['colHideOnMobile'] == 'hide') {
          $colHideOnMobile ="display:none !important;";
        }
      }
      

      if (isset($columnOptions['colBoxShadow'])) {
        $colBoxShadow = $columnOptions['colBoxShadow'];
        $this_col_border_shadow = 'box-shadow: '.$colBoxShadow['colBoxShadowH'].'px  '.$colBoxShadow['colBoxShadowV'].'px  '.$colBoxShadow['colBoxShadowBlur'].'px '.$colBoxShadow['colBoxShadowColor'].' ;  ';
      }else{
        $this_col_border_shadow = '';
      }

      if (isset($columnOptions['colBorder'])) {
        $colBorder = $columnOptions['colBorder'];
        $thisColBorder = 'border: '.$colBorder['colBorderWidth'].'px '.$colBorder['colBorderStyle'].' '.$colBorder['colBorderColor'].' ; border-radius:'.$colBorder['colBorderRadius'].'px;';
      }else{
        $thisColBorder = '';
      }
      $this_col_border_shadow = $this_col_border_shadow.$thisColBorder;

      if (isset($columnOptions['paddingTablet'])) {

        $colWidthTablet = $columnOptions['widthTablet'];
        $colWidthMobile = $columnOptions['widthMobile'];
        
        $colMarginTablet = $columnOptions['marginTablet'];
        $colMarginMobile = $columnOptions['marginMobile'];
        $colPaddingTablet = $columnOptions['paddingTablet'];
        $colPaddingMobile = $columnOptions['paddingMobile'];


        $thisRowResponsiveColStylesTablet = "
        #".$row["rowID"]."-$Columni  {
         width:".$colWidthTablet."% !important;
         margin-top: ".$colMarginTablet['rMTT']."% !important;
         margin-bottom: ".$colMarginTablet['rMBT']."% !important;
         margin-left: ".$colMarginTablet['rMLT']."% !important;
         margin-right: ".$colMarginTablet['rMRT']."% !important;

         padding-top: ".$colPaddingTablet['rPTT']."% !important;
         padding-bottom: ".$colPaddingTablet['rPBT']."% !important;
         padding-left: ".$colPaddingTablet['rPLT']."% !important;
         padding-right: ".$colPaddingTablet['rPRT']."% !important;

         min-height:".$rowHeightTablet."$rowHeightUnitTablet !important;
         $colHideOnTablet
        }
      
        ";
      

        $thisRowResponsiveColStylesMobile = "
          #".$row["rowID"]."-$Columni  {
           width:".$colWidthMobile."% !important;
           margin-top: ".$colMarginMobile['rMTM']."% !important;
           margin-bottom: ".$colMarginMobile['rMBM']."% !important;
           margin-left: ".$colMarginMobile['rMLM']."% !important;
           margin-right: ".$colMarginMobile['rMRM']."% !important;

           padding-top: ".$colPaddingMobile['rPTM']."% !important;
           padding-bottom: ".$colPaddingMobile['rPBM']."% !important;
           padding-left: ".$colPaddingMobile['rPLM']."% !important;
           padding-right: ".$colPaddingMobile['rPRM']."% !important;

           min-height:".$rowHeightMobile."$rowHeightUnitMobile !important;
           $colHideOnMobile
          }
        
        ";

        array_push($POPBNallRowStylesResponsiveTablet, $thisRowResponsiveColStylesTablet);
        array_push($POPBNallRowStylesResponsiveMobile, $thisRowResponsiveColStylesMobile);

      }


      $colBackgroundOptions = 'background:'.$columnBgColor.';';

        $this_column_bg_img = '';
        if (isset($columnOptions['colBgImg'])) {
          $this_column_bg_img = $columnOptions['colBgImg'];
          if ($this_column_bg_img !== '') {
            $colBackgroundOptions = 'background: url('.$this_column_bg_img.') no-repeat center; background-size:cover;';
          }
        }
        

        if (isset($columnOptions['colBackgroundType'])) {

          if ($columnOptions['colBackgroundType'] == 'gradient') {
            $colGradient = $columnOptions['colGradient'];

            if ($colGradient['colGradientType'] == 'linear') {
              $colBackgroundOptions = 'background: linear-gradient('.$colGradient['colGradientAngle'].'deg, '.$colGradient['colGradientColorFirst'].' '.$colGradient['colGradientLocationFirst'].'%,'.$colGradient['colGradientColorSecond'].' '.$colGradient['colGradientLocationSecond'].'%);';
            }

            if ($colGradient['colGradientType'] == 'radial') {
              $colBackgroundOptions = 'background: radial-gradient(at '.$colGradient['colGradientPosition'].', '.$colGradient['colGradientColorFirst'].' '.$colGradient['colGradientLocationFirst'].'%,'.$colGradient['colGradientColorSecond'].' '.$colGradient['colGradientLocationSecond'].'%);';
            }
            
          }
        }

        $colID = $row["rowID"]."-$Columni";
        $thisColHoverOption = '';
        if (isset($columnOptions['colHoverOptions'])) {
          $colHoverOptions = $columnOptions['colHoverOptions'];

          if (isset($colHoverOptions['colBackgroundTypeHover'])) {

            if ($colHoverOptions['colBackgroundTypeHover'] == 'solid') {
              $thisColHoverOption = ' #'.$colID.':hover { background:'.$colHoverOptions['colBgColorHover'].' !important; transition: all '.$colHoverOptions['colHoverTransitionDuration'].'s; }';
            }
            if ($colHoverOptions['colBackgroundTypeHover'] == 'gradient') {
              $colGradientHover = $colHoverOptions['colGradientHover'];

              if ($colGradientHover['colGradientTypeHover'] == 'linear') {
                $thisColHoverOption = ' #'.$colID.':hover { background: linear-gradient('.$colGradientHover['colGradientAngleHover'].'deg, '.$colGradientHover['colGradientColorFirstHover'].' '.$colGradientHover['colGradientLocationFirstHover'].'%,'.$colGradientHover['colGradientColorSecondHover'].' '.$colGradientHover['colGradientLocationSecondHover'].'%) !important; transition: all '.$colHoverOptions['colHoverTransitionDuration'].'s; }';
              }

              if ($colGradientHover['colGradientTypeHover'] == 'radial') {

                $thisColHoverOption = ' #'.$colID.':hover { background: radial-gradient(at '.$colGradientHover['colGradientPositionHover'].', '.$colGradientHover['colGradientColorFirstHover'].' '.$colGradientHover['colGradientLocationFirstHover'].'%,'.$colGradientHover['colGradientColorSecondHover'].' '.$colGradientHover['colGradientLocationSecondHover'].'%) !important; transition: all '.$colHoverOptions['colHoverTransitionDuration'].'s; }';
              }
            }
          }

          $thisColHoverStyleTag = ' '.$thisColHoverOption.' ';
          
          array_push($POPBallColumnStylesArray, $thisColHoverStyleTag);
        }




      $columnMarginTop = $columnMargin['columnMarginTop'];
      $columnMarginBottom = $columnMargin['columnMarginBottom'];
      $columnMarginLeft = $columnMargin['columnMarginLeft'];
      $columnMarginRight = $columnMargin['columnMarginRight'];

      $columnPaddingTop = $columnPadding['columnPaddingTop'];
      $columnPaddingBottom = $columnPadding['columnPaddingBottom'];
      $columnPaddingLeft = $columnPadding['columnPaddingLeft'];
      $columnPaddingRight = $columnPadding['columnPaddingRight'];


      $columnMarginStyle = "margin:$columnMarginTop"."% $columnMarginRight"."% $columnMarginBottom"."% $columnMarginLeft"."% ;";

      $columnPaddingStyle = "padding:$columnPaddingTop"."% $columnPaddingRight"."% $columnPaddingBottom"."% $columnPaddingLeft"."% ;";
      
      $columnContent = "";
      //Widgets
      include('widgets.php');
        
        $columnWidthUnit = '%';

        if ($columnWidth == 0 || $columnWidth === "") {
          switch ($columns) {
          case '1':
            $columnWidthPercent = '99';
            break;
          case '2':
            $columnWidthPercent = '49';
            break;
          case '3':
            $columnWidthPercent = '33.3';
            break;
          case '4':
            $columnWidthPercent = '24';
            break;
          case '5':
            $columnWidthPercent = '19';
            break;
          case '6':
            $columnWidthPercent = '16';
            break;
          case '7':
            $columnWidthPercent = '13.5';
            break;
          case '8':
            $columnWidthPercent = '11.5';
            break;
          case '9':
            $columnWidthPercent = '10.5';
            break;
          case '10':
            $columnWidthPercent = '5';
            break;  
          default:
            $columnWidthPercent = '99';
            break;
        }
        } else{
            
            if ((int)$columnWidth > 101) {
              $columnWidthPercent = ($columnWidth/1268)*100;
            }else{

              $columnWidthUnit = '%';
              $columnWidthPercent = $columnWidth;
            }
            // $columnWidthPercent = floor( ($columnWidth/1268)*100);
        }

          //$columnWidthPercent = ($columnWidth/1268)*100;
          $colHeight = '10';
      $columnStyles =  "#".$row["rowID"]."-$Columni {"."width:".$columnWidthPercent.$columnWidthUnit."; min-height:$rowHeight"."px; $colBackgroundOptions background-color:$columnBgColor; $columnMarginStyle  $columnPaddingStyle  $this_col_border_shadow  $columnCSS  $colHideOnDesktop }";

      array_push($POPBallColumnStylesArray, $columnStyles);

      ?> 
      <div id='<?php echo $row["rowID"]."-$Columni"; ?>' class='column <?php echo "pb-col"."-$columns";  echo "  ".$columnCustomClass;  ?>'> <?php echo $columnContent; ?> </div> <!-- Column ends!-->
      <?php

      
    } // For loop columns ends here ?>