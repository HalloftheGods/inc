!function(n){var e=Upfront.Settings&&Upfront.Settings.l10n?Upfront.Settings.l10n.global.views:Upfront.mainData.l10n.global.views;upfrontrjs.define(["scripts/upfront/upfront-views-editor/commands/command"],function(t){return t.extend({className:"command-redo sidebar-commands-small-button icon-button",initialize:function(){Upfront.Events.on("command:undo",this.render,this),this.deactivate()},render:function(){this.$el.addClass("upfront-icon upfront-icon-redo"),this.$el.prop("title",e.redo),this.model.has_redo_states()?this.activate():this.deactivate()},activate:function(){this.$el.addClass("disabled")},deactivate:function(){this.$el.removeClass("disabled")},on_click:function(){var t=this,o=!1,i=new Upfront.Views.Editor.Loading({loading:e.redoing,done:e.redoing_done,fixed:!0});i.render(),n("body").append(i.$el),o=t.model.restore_redo_state(),o&&o.done?o.done(function(){Upfront.Events.trigger("command:redo"),t.render(),i.done()}):setTimeout(function(){i.done()},100)}})})}(jQuery);