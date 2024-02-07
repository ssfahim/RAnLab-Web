<livewire:review-amend-table-header></livewire:review-amend-table-header>

<div class="review_item">
    <div class="review_title">
    	<div class="review_title_line">
        	<div class="review_title_line_label">
            	Region:
            </div><!--REVIEW_TITLE_LINE_LABEL-->
            <div class="review_title_line_content">
            	St. John's
            </div><!--REVIEW_TITLE_LINE_CONTENT-->
            <div class="clear"></div><!--CLEAR-->
        </div><!--REVIEW_TITLE_LINE-->
    
        <div class="review_title_line">
        	<div class="review_title_line_label">
            	Submitted By:
            </div><!--REVIEW_TITLE_LINE_LABEL-->
            <div class="review_title_line_content">
            	{{ $this->review->submitted_by_id }}
            </div><!--REVIEW_TITLE_LINE_CONTENT-->
            <div class="clear"></div><!--CLEAR-->
        </div><!--REVIEW_TITLE_LINE-->
        
        <div class="review_title_line">
        	<div class="review_title_line_label">
            	Submitted On:
            </div><!--REVIEW_TITLE_LINE_LABEL-->
            <div class="review_title_line_content">
            	{{ $this->review->date_submitted }}
            </div><!--REVIEW_TITLE_LINE_CONTENT-->
            <div class="clear"></div><!--CLEAR-->
        </div><!--REVIEW_TITLE_LINE-->
    	
        <div class="clear"></div><!--CLAER-->    
    </div><!--REVIEW_TITLE-->

	<div class="review_body">    
        <div class="update_panel">
            <input id="review_id" type="hidden" value="{{ $this->review->id }}" />
            <input type="button" onclick="window.location='/review/{{ $this->review->id }}'" value="Back to Request" />
            <input id="submit_review" type="button" value="Finish Amending" />
        </div><!--UPDATE_PANEL-->
    </div><!--REVIEW_BODY-->
    
    <div class="clear"></div><!--CLEAR-->
</div><!--REVIEW_ITEM-->