CCDNForum KarmaBundle Configuration Reference.
==============================================

All available configuration options are listed below with their default values.

``` yml
#
# for CCDNForum KarmaBundle
#
ccdn_forum_karma:
    user:
        profile_route: cc_profile_show_by_id 
    template:
        engine: twig
	seo:
		title_length: 67
    review:
        review_all:
        	layout_template: CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
            reviews_per_page: 40
            topic_title_truncate: 70
            rating_datetime_format: "d-m-Y - H:i"
			enable_bb_parser: true
    rate:
        rate:
            layout_template: CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
            form_theme: CCDNForumKarmaBundle:Form:fields.html.twig
			enable_bb_editor: true

```

- [Return back to the docs index](index.md).
