/**
 * Scripts within the customizer controls window.
 *
 * Contextually shows the color hue control and informs the preview
 * when users open or close the front page sections section.
 */

(function( $, api ) {
    wp.customize.bind('ready', function() {
    	// Show message on change.
        var bond_construction_settings = ['bond_construction_slider_num', 'bond_construction_services_num', 'bond_construction_projects_num', 'bond_construction_testimonial_num', 'bond_construction_blog_section_num', 'bond_construction_reset_settings', 'bond_construction_testimonial_num', 'bond_construction_partner_num'];
        _.each( bond_construction_settings, function( bond_construction_setting ) {
            wp.customize( bond_construction_setting, function( setting ) {
                var wildbusinessNotice = function( value ) {
                    var name = 'needs_refresh';
                    if ( value && bond_construction_setting == 'bond_construction_reset_settings' ) {
                        setting.notifications.add( 'needs_refresh', new wp.customize.Notification(
                            name,
                            {
                                type: 'warning',
                                message: localized_data.reset_msg,
                            }
                        ) );
                    } else if( value ){
                        setting.notifications.add( 'reset_name', new wp.customize.Notification(
                            name,
                            {
                                type: 'info',
                                message: localized_data.refresh_msg,
                            }
                        ) );
                    } else {
                        setting.notifications.remove( name );
                    }
                };

                setting.bind( wildbusinessNotice );
            });
        });

        /* === Radio Image Control === */
        api.controlConstructor['radio-color'] = api.Control.extend( {
            ready: function() {
                var control = this;

                $( 'input:radio', control.container ).change(
                    function() {
                        control.setting.set( $( this ).val() );
                    }
                );
            }
        } );


         // Sortable sections
        jQuery( 'ul.bond-construction-sortable-list' ).sortable({
            handle: '.bond-construction-drag-handle',
            axis: 'y',
            update: function( e, ui ){
                jQuery('input.bond-construction-sortable-input').trigger( 'change' );
            }
        });

        // Sortable sections
        jQuery( "body" ).on( 'hover', '.bond-construction-drag-handle', function() {
            jQuery( 'ul.bond-construction-sortable-list' ).sortable({
                handle: '.bond-construction-drag-handle',
                axis: 'y',
                update: function( e, ui ){
                    jQuery('input.bond-construction-sortable-input').trigger( 'change' );
                }
            });
        });

        /* On changing the value. */
        jQuery( "body" ).on( 'change', 'input.bond-construction-sortable-input', function() {
            /* Get the value, and convert to string. */
            this_checkboxes_values = jQuery( this ).parents( 'ul.bond-construction-sortable-list' ).find( 'input.bond-construction-sortable-input' ).map( function() {
                return this.value;
            }).get().join( ',' );

            /* Add the value to hidden input. */
            jQuery( this ).parents( 'ul.bond-construction-sortable-list' ).find( 'input.bond-construction-sortable-value' ).val( this_checkboxes_values ).trigger( 'change' );

        });

        // Deep linking for counter section to about section.
        jQuery('.bond-construction-edit').click(function(e) {
            e.preventDefault();
            var jump_to = jQuery(this).attr( 'data-jump' );
            wp.customize.section( jump_to ).focus()
        });

    });
})( jQuery, wp.customize );
