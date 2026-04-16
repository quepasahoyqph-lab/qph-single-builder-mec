add_meta_box(
    'qph_conditions',
    'Display Conditions',
    function($post) {

        $conds = get_post_meta($post->ID, '_qph_conditions', true);

        echo '<select name="qph_conditions[type][]">
                <option value="all">All Events</option>
                <option value="category">Category</option>
                <option value="event">Specific Event</option>
              </select>';
    },
    'mec_esb'
);