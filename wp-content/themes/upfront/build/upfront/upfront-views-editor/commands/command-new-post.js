!function(t){var o=Upfront.Settings&&Upfront.Settings.l10n?Upfront.Settings.l10n.global.views:Upfront.mainData.l10n.global.views;upfrontrjs.define(["scripts/upfront/upfront-views-editor/commands/command"],function(n){return n.extend({className:"command-new-post sidebar-commands-button light",postView:!1,postType:"post",setMode:!1,initialize:function(){this.setMode=Upfront.Application.MODE.CONTENT},render:function(){Upfront.Events.trigger("command:newpost:start",!0),this.$el.html(o.new_post),this.$el.prop("title",o.new_post)},on_click:function(n){if(n.preventDefault(),Upfront.Settings.LayoutEditor.newpostType==this.postType)return Upfront.Views.Editor.notify(o.already_creating_post.replace(/%s/,this.postType),"warning");var e=new Upfront.Views.Editor.Loading({loading:o.loading,fixed:!0});e.render(),t("body").append(e.$el),Upfront.Util.post({action:"upfront-create-post_type",data:_.extend({post_type:this.postType},{})}).done(function(t){e.remove(),_upfront_post_data&&(_upfront_post_data.post_id=t.data.post_id),Upfront.Application.navigate("/edit/post/"+t.data.post_id,{trigger:!0}),Upfront.Events.trigger("click:edit:navigate",t.data.post_id)})},on_post_loaded:function(t){this.postView||(this.postView=t,t.editPost(t.post),Upfront.data.currentEntity=t,Upfront.Events.off("elements:this_post:loaded",this.on_post_loaded,this),Upfront.Events.on("upfront:application:contenteditor:render",this.select_title,this))},select_title:function(){var o=this.postView.$(".post_title input").focus();o.val(o.val()),t("#upfront-loading").remove(),Upfront.Events.off("upfront:application:contenteditor:render",this.select_title,this)}})})}(jQuery);