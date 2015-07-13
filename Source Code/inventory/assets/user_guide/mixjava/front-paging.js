var venue_page = 1;
var accom_page = 1;
var promo_page = 1;

// Show only 3 venue and accom
$(function() {
	$("#quicktabs_tabpage_4_0 .views-row:gt(2)").hide();
	$("#quicktabs_tabpage_4_1 .views-row:gt(2)").hide();
	$("#block-views-front_promotion_block-block_1 .views-row:gt(2)").hide();
});

function rotateVenuePrev() {
	switch(venue_page) {
		case 2:
			$("#quicktabs_tabpage_4_0 .views-row").show();
			$("#quicktabs_tabpage_4_0 .views-row:gt(2)").hide();
			venue_page = 1;
			break;
		case 3:
			$("#quicktabs_tabpage_4_0 .views-row:gt(0)").show();
			$("#quicktabs_tabpage_4_0 .views-row:lt(3)").hide();
			$("#quicktabs_tabpage_4_0 .views-row:gt(5)").hide();
			venue_page = 2;
			break;
		case 4:
			$("#quicktabs_tabpage_4_0 .views-row:gt(0)").show();
			$("#quicktabs_tabpage_4_0 .views-row:lt(6)").hide();
			$("#quicktabs_tabpage_4_0 .views-row:gt(8)").hide();
			venue_page = 3;
			break;
	}
}
function rotateVenueNext() {
	switch(venue_page) {
		case 1:
			$("#quicktabs_tabpage_4_0 .views-row:gt(0)").show();
			$("#quicktabs_tabpage_4_0 .views-row:lt(3)").hide();
			$("#quicktabs_tabpage_4_0 .views-row:gt(5)").hide();
			venue_page = 2;
			break;
		case 2:
			$("#quicktabs_tabpage_4_0 .views-row:gt(0)").show();
			$("#quicktabs_tabpage_4_0 .views-row:lt(6)").hide();
			$("#quicktabs_tabpage_4_0 .views-row:gt(8)").hide();
			venue_page = 3;
			break;
		case 3:
			$("#quicktabs_tabpage_4_0 .views-row:gt(0)").show();
			$("#quicktabs_tabpage_4_0 .views-row:lt(9)").hide();
			venue_page = 4;
			break;
	}
}

function rotateAccomPrev() {
	switch(accom_page) {
		case 2:
			$("#quicktabs_tabpage_4_1 .views-row").show();
			$("#quicktabs_tabpage_4_1 .views-row:gt(2)").hide();
			accom_page = 1;
			break;
		case 3:
			$("#quicktabs_tabpage_4_1 .views-row:gt(0)").show();
			$("#quicktabs_tabpage_4_1 .views-row:lt(3)").hide();
			$("#quicktabs_tabpage_4_1 .views-row:gt(5)").hide();
			accom_page = 2;
			break;
		case 4:
			$("#quicktabs_tabpage_4_1 .views-row:gt(0)").show();
			$("#quicktabs_tabpage_4_1 .views-row:lt(6)").hide();
			$("#quicktabs_tabpage_4_1 .views-row:gt(8)").hide();
			accom_page = 3;
			break;
	}
}
function rotateAccomNext() {
	switch(accom_page) {
		case 1:
			$("#quicktabs_tabpage_4_1 .views-row:gt(0)").show();
			$("#quicktabs_tabpage_4_1 .views-row:lt(3)").hide();
			$("#quicktabs_tabpage_4_1 .views-row:gt(5)").hide();
			accom_page = 2;
			break;
		case 2:
			$("#quicktabs_tabpage_4_1 .views-row:gt(0)").show();
			$("#quicktabs_tabpage_4_1 .views-row:lt(6)").hide();
			$("#quicktabs_tabpage_4_1 .views-row:gt(8)").hide();
			accom_page = 3;
			break;
		case 3:
			$("#quicktabs_tabpage_4_1 .views-row:gt(0)").show();
			$("#quicktabs_tabpage_4_1 .views-row:lt(9)").hide();
			accom_page = 4;
			break;
	}
}

function rotatePromoPrev() {
	switch(promo_page) {
		case 2:
			$("#block-views-front_promotion_block-block_1 .views-row").show();
			$("#block-views-front_promotion_block-block_1 .views-row:gt(2)").hide();
			promo_page = 1;
			break;
		case 3:
			$("#block-views-front_promotion_block-block_1 .views-row:gt(0)").show();
			$("#block-views-front_promotion_block-block_1 .views-row:lt(3)").hide();
			$("#block-views-front_promotion_block-block_1 .views-row:gt(5)").hide();
			promo_page = 2;
			break;
		case 4:
			$("#block-views-front_promotion_block-block_1 .views-row:gt(0)").show();
			$("#block-views-front_promotion_block-block_1 .views-row:lt(6)").hide();
			$("#block-views-front_promotion_block-block_1 .views-row:gt(8)").hide();
			promo_page = 3;
			break;
	}
}
function rotatePromoNext() {
	switch(promo_page) {
		case 1:
			$("#block-views-front_promotion_block-block_1 .views-row:gt(0)").show();
			$("#block-views-front_promotion_block-block_1 .views-row:lt(3)").hide();
			$("#block-views-front_promotion_block-block_1 .views-row:gt(5)").hide();
			promo_page = 2;
			break;
		case 2:
			$("#block-views-front_promotion_block-block_1 .views-row:gt(0)").show();
			$("#block-views-front_promotion_block-block_1 .views-row:lt(6)").hide();
			$("#block-views-front_promotion_block-block_1 .views-row:gt(8)").hide();
			promo_page = 3;
			break;
		case 3:
			$("#block-views-front_promotion_block-block_1 .views-row:gt(0)").show();
			$("#block-views-front_promotion_block-block_1 .views-row:lt(9)").hide();
			promo_page = 4;
			break;
	}
}// JavaScript Document