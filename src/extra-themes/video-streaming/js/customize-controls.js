( function( api ) {

	// Extends our custom "video-streaming" section.
	api.sectionConstructor['video-streaming'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );