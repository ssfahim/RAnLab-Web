<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

	<div class="dashboard_row">
    	<!-- Link to Reports -->
        <div class="dashboard_row_half dashboard_row_item">
        	<div class="dashboard_cta">
            	<div class="dashboard_cta_left">
                	<img src="/images/reports.svg">
                </div><!--DASHBOARD_CTA_LEFT-->
                <div class="dashboard_cta_right">
                	<div class="dashboard_cta_title">
                    	Get your custom report.
                    </div><!--DASHBOARD_CTA_TITLE-->
                    <div class="dashboard_cta_body">
                    	We've made a custom report for your region including projections and data summaries.
                    </div><!--DASHBOARD_CTA_BODY-->
                    <div class="dashboard_cta_btn_container">
                    	<button type="button" class="cta_button" onclick="window.location.href='/reports/FlowersCove_RAnLab_MNL_FactSheets_Combined_Report.pdf';">
                        	Download Now
                        </button>
                    </div><!--DASHBOARD_CTA_BTN_CONTAINER-->
                    <div class="dashboard_cta_more">
                    	Learn More
                    </div><!--DASHBOARD_CTA_MORE-->
                </div><!--DASHBOARD_CTA_RIGHT-->
            	<div class="clear"></div><!--CLEAR-->
            </div><!--DASHBOARD_CTA-->
        </div><!--DASHBOARD_ROW_HALF-->

        <!-- Link to Businesses -->
        <div class="dashboard_row_half dashboard_row_item">
        	<div class="dashboard_cta">
            	<div class="dashboard_cta_left">
                	<img src="/images/business.svg">
                </div><!--DASHBOARD_CTA_LEFT-->
                <div class="dashboard_cta_right">
                	<div class="dashboard_cta_title">
                    	Keep your businesses up-to-date.
                    </div><!--DASHBOARD_CTA_TITLE-->
                    <div class="dashboard_cta_body">
                    	Help us give you the most from your data by updating your region's businesses.
                    </div><!--DASHBOARD_CTA_BODY-->
                    <div class="dashboard_cta_btn_container">
                    	<button  type="button" class="cta_button" onclick="window.location.href='/business';">
                        	Update Now
                        </button>
                    </div><!--DASHBOARD_CTA_BTN_CONTAINER-->
                    <div class="dashboard_cta_more">
                    	Learn More
                    </div><!--DASHBOARD_CTA_MORE-->
                </div><!--DASHBOARD_CTA_RIGHT-->
            	<div class="clear"></div><!--CLEAR-->
            </div><!--DASHBOARD_CTA-->
       	</div><!--DASHBOARD_ROW_HALF-->

    	<div class="clear"></div><!--CLEAR-->
    </div><!--DASHBOARD_ROW-->

	<div class="dashboard_row">
    	<!-- Population Change Chart -->
        <div class="dashboard_row_half dashboard_row_item">
        	{{ $popChart->container() }}
        </div><!--DASHBOARD_ROW_HALF-->

        <!-- Age Groups Chart -->
        <div class="dashboard_row_half dashboard_row_item">
        	{{ $ageChart->container() }}
        </div><!--DASHBOARD_ROW_HALF-->

    	<div class="clear"></div><!--CLEAR-->
    </div><!--DASHBOARD_ROW-->


    <div class="dashboard_row">
    	<!-- Births and Deaths Chart -->
        <div class="dashboard_row_full dashboard_row_item">
        	{{ $birthChart->container() }}
        </div><!--DASHBOARD_ROW_FULL-->

    	<div class="clear"></div><!--CLEAR-->
    </div><!--DASHBOARD_ROW-->

    <script src="{!! $popChart->cdn() !!}"></script>
    {{ $popChart->script() }}
    {{ $ageChart->script() }}
    {{ $birthChart->script() }}

</x-app-layout>
