<?php
$data = get_option('pricimizer_global_settings');

$api_key = isset($data['api_key']) ? $data['api_key'] : '';
$optimize_by = isset($data['optimize_by']) ? $data['optimize_by'] : [];
?>

<h1>Pricimizer - Global Settings</h1>

<section class="import_left_section">
    <form method="POST" id="cart_sync">
        <table class="widefat fixed siteblox-table">
            <tbody>
                <tr>
                    <th><span title="To obtain your API key, simply register on Pricimizer website by clicking on the 'Get your API key' button."><i class="fa fa-info-circle"></i> <b>API Key:</b></span></th>
                </tr>
                <tr class="alternate inner_link">
                    <td style="padding-left:40px">
                        <input type="text" name="api_key" id="api_key" placeholder="API Key" value="<?php echo esc_html($api_key); ?>" required>
                        <a class="button" style="vertical-align:baseline" target="_blank" href="https://pricimizer.com/register?for=wordpress"><b>Get your API key</b></a>
                    </td>
                </tr>

                <tr>
                    <th><span title="To optimize effectively, please clarify the specific factors you wish to consider. You can also leave them unchecked."><i class="fa fa-info-circle"></i> <b>Optimize by:</b></span></th>
                </tr>
                <tr class="alternate checkboxes">
                    <td style="padding-left:40px">
                        <label for="optimize-by-country">
                            <input type="checkbox" name="optimize_by[]" id="optimize-by-country" placeholder="Min" value="country" <?php echo in_array("country", $optimize_by) ? 'checked' : ''?>>
                            <span>Country</span>
                        </label>

                        <label for="optimize-by-month">
                            <input type="checkbox" name="optimize_by[]" id="optimize-by-month" value="month" <?php echo in_array("month", $optimize_by) ? 'checked' : ''?>>
                            <span>Month</span>
                        </label>

                        <label for="optimize-by-weekday">
                            <input type="checkbox" name="optimize_by[]" id="optimize-by-weekday" value="weekday" <?php echo in_array("weekday", $optimize_by) ? 'checked' : ''?>>
                            <span>Weekday</span>
                        </label>

                        <label for="optimize-by-os" title="People who own relatively more expensive operating systems like Apple, can be OK with higher prices. Check this option to see if it has any effect on your sales to find the most profitable prices for each operating system.">
                            <input type="checkbox" name="optimize_by[]" id="optimize-by-os" value="os" <?php echo in_array('os', $optimize_by) ? 'checked' : ''?>>
                            <span>OS</span>
                        </label>
                    </td>
                </tr>

                <tr>
                    <td style="padding-left:40px">
                        <ul>
                            <li style="margin-bottom: 10px"><i class="fa fa-info-circle"></i> <b>Country (by IP)</b>: Sometimes people in countries with a good economy are able to pay more for your products. To find the most profitable prices by country check this option.</li>
                            <li style="margin-bottom: 10px"><i class="fa fa-info-circle"></i> <b>Month</b>: Sometimes people are willing to pay more to buy some products on certain months of the year. If you want to find the most profitable prices by month, check this option.</li>
                            <li style="margin-bottom: 10px"><i class="fa fa-info-circle"></i> <b>Weekday</b>: People are willing to pay more for some products on specific weekdays (For example for fast food on working days). If you want to find the most profitable prices by weekday (Monday, Tuesday,...) check this option.</li>
                            <li style="margin-bottom: 10px"><i class="fa fa-info-circle"></i> <b>OS</b>: People who own expensive operating systems like Apple, possibly can pay more. Check this option to find the most profitable prices for each operating system.</li>
                            <li style="margin-bottom: 10px"><u><b>Notice</b></u>: the more optimize items you check, the longer time it takes to optimize.</li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>

        <p><b>After this, please <a href="<?php echo esc_url(admin_url('edit.php?post_type=product')) ?>">edit your products</a> and set your desired dynamic prices for each of them in their price section.</b></p>

        <div class="submit-buttons-import">
            <input type="hidden" id="action_feature" name="action" value="pricimizer_setting_update">
            <button type="submit" id="cartsync_btn" class="button button-pro">Submit</button>
        </div>
    </form>
</section>