!function(n){var e=Upfront.Settings&&Upfront.Settings.l10n?Upfront.Settings.l10n.global.views:Upfront.mainData.l10n.global.views;upfrontrjs.define(["scripts/upfront/upfront-views-editor/commands/command"],function(n){return n.extend({tagName:"li",className:"command-open-media-gallery upfront-icon upfront-icon-open-gallery",render:function(){this.$el.html('<a title="'+e.media+'">'+e.media+"</a>")},on_click:function(){Upfront.Media.Manager.open({media_type:["images","videos","audios","other"],can_toggle_control:!0,show_control:!1,show_insert:!1})}})})}(jQuery);