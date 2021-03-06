/**
 * @class Denkmal_Component_HeaderBar
 * @extends Denkmal_Component_Abstract
 */
var Denkmal_Component_HeaderBar = Denkmal_Component_Abstract.extend({

	/** @type String */
	_class: 'Denkmal_Component_HeaderBar',

	/** @type Denkmal_Form_SearchContent|Null */
	_searchForm: null,

	events: {
		'click .showSearch': 'showSearch'
	},

	childrenEvents: {
		'CM_FormField_Text focus': function() {
			this._expandSearch(true);
		},
		'CM_FormField_Text blur': function() {
			this._expandSearch(false);
		}
	},

	showSearch: function() {
		if (!this._hasSearchForm()) {
			return;
		}
		this._expandSearch(true);
		console.log(this);
		console.log(this._getSearchForm());
		this._getSearchForm().setFocus();
	},

	/**
	 * @return Denkmal_Form_SearchContent
	 */
	_getSearchForm: function() {
		if (null === this._searchForm) {
			this._searchForm = this.findChild('Denkmal_Form_SearchContent');
		}
		return this._searchForm;
	},

	/**
	 * @returns {Boolean}
	 */
	_hasSearchForm: function() {
		return (null !== this._getSearchForm());
	},

	/**
	 * @param {Boolean} state
	 */
	_expandSearch: function(state) {
		this.$('.bar').toggleClass('search-expand', state);
	}
});
