!function(t){var i=Upfront.Settings&&Upfront.Settings.l10n?Upfront.Settings.l10n.global.views:Upfront.mainData.l10n.global.views;upfrontrjs.define(["scripts/upfront/upfront-views-editor/settings/settings-lightbox-trigger","scripts/upfront/upfront-views-editor/fields"],function(t,e){return t.extend({initialize:function(n){this.options=n,t.prototype.initialize.call(this,this.options),this.options.fields.push(new e.Text({model:this.model,property:"lightbox_label",label:i.label}))},get_values:function(){return{anchor:this.fields._wrapped[0].get_value(),label:this.fields._wrapped[1].get_value()}}})})}(jQuery);