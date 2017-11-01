!function(t){var e=Upfront.Settings&&Upfront.Settings.l10n?Upfront.Settings.l10n.global.views:Upfront.mainData.l10n.global.views;upfrontrjs.define(["text!upfront/templates/popup.html","scripts/perfect-scrollbar/perfect-scrollbar"],function(o,n){return Backbone.View.extend({className:"upfront-entity_list-posts",postListTpl:_.template(t(o).find("#upfront-post-list-tpl").html()),postSingleTpl:_.template(t(o).find("#upfront-post-single-tpl").html()),paginationTpl:_.template(t(o).find("#upfront-pagination-tpl").html()),events:{"click .editaction.edit":"handle_post_edit","click #upfront-list-page-path a.upfront-path-back":"handle_return_to_posts","click .editaction.trash":"trash_confirm","click .upfront-posts-delete-cancel-button":"trash_cancel","click .upfront-posts-delete-button":"trash_post"},initialize:function(t){this.collection.on("change reset",this.render,this),this.listenTo(Upfront.Events,"post:saved",this.post_saved)},render:function(){this.$el.empty().append(this.postListTpl({posts:this.collection.getPage(this.collection.pagination.currentPage),orderby:this.collection.orderby,order:this.collection.order,canEdit:Upfront.Application.user_can("EDIT"),canEditOwn:Upfront.Application.user_can("EDIT_OWN")})),n.withDebounceUpdate(this.$el.find(".upfront-scroll-panel")[0],!0,!1,!0),this.add_tooltips()},add_tooltips:function(){this.$el.find(".editaction.edit").utooltip({fromTitle:!1,content:Upfront.Settings.l10n.global.content.edit_post,panel:"postEditor"}),this.$el.find(".editaction.trash").utooltip({fromTitle:!1,content:Upfront.Settings.l10n.global.content.trash_post,panel:"postEditor"})},handle_sort_request:function(e){var o=t(e.target).closest(".upfront-list_item-component"),n=o.attr("data-sortby"),i=this.collection.order;n&&(n==this.collection.orderby&&(i="desc"==i?"asc":"desc"),this.collection.reSort(n,i))},handle_post_edit:function(e){e.preventDefault();var o=t(e.currentTarget).closest(".upfront-list_item-post").attr("data-post_id");_upfront_post_data&&(_upfront_post_data.post_id=o),Upfront.Application.navigate("/edit/post/"+o,{trigger:!0}),Upfront.Events.trigger("click:edit:navigate",o)},handle_post_view:function(e){e.preventDefault();var o=t(e.currentTarget).closest(".upfront-list_item-post").attr("data-post_id");window.location.href=this.collection.get(o).get("permalink")},trash_confirm:function(e){e.preventDefault(),t(e.target).parents(".upfront-list_item").find(".upfront-delete-confirm").show()},trash_cancel:function(e){t(e.target).parents(".upfront-delete-confirm").hide()},trash_post:function(e){var o=this,n=t(e.currentTarget).closest(".upfront-list_item-post.upfront-list_item"),i=n.attr("data-post_id");t(e.target).parents(".upfront-delete-confirm").hide(),this.collection.get(i).set("post_status","trash").save().done(function(){o.collection.remove(o.collection.get(i))})},expand_post:function(o){var n=this;o.featuredImage||this.collection.post({action:"get_post_extra",postId:o.id,thumbnail:!0,thumbnailSize:"medium"}).done(function(t){t.data.thumbnail&&t.data.postId==o.id?(n.$("#upfront-page_preview-featured_image img").attr("src",t.data.thumbnail[0]).show(),n.$(".upfront-thumbnailinfo").hide(),o.featuredImage=t.data.thumbnail[0]):(n.$(".upfront-thumbnailinfo").text(e.no_image),n.$(".upfront-page_preview-edit_feature a").html('<i class="icon-plus"></i> '+e.add))}),t("#upfront-list-page").show("slide",{direction:"right"},"fast"),this.$el.find("#upfront-list").hide(),t("#upfront-page_preview-edit button").one("click",function(){var t="/edit/post/"+o.id;window.location.search.indexOf("dev=true")>-1&&(t+="?dev=true"),Upfront.Popup.close(),_upfront_post_data&&(_upfront_post_data.post_id=o.id),Upfront.Application.navigate(t,{trigger:!0})}),this.bottomContent=t("#upfront-popup-bottom").html(),t("#upfront-popup-bottom").html(t('<a href="#" id="upfront-back_to_posts">'+e.back_to_posts+"</a>").on("click",function(t){n.handle_return_to_posts()}))},post_saved:function(){this.collection.fetch()},handle_return_to_posts:function(){var e=this;this.$el.find("#upfront-list").show("slide",{direction:"left"},function(){e.collection.trigger("reset")}),t("#upfront-list-page").hide()}})})}(jQuery);