<?php
$data = get_option('pricimizer_global_settings');

$api_key = isset($data['api_key']) ? $data['api_key'] : '';
$pricing_model = isset($data['pricing_model']) ? $data['pricing_model'] : '';
$pricing_range_min = isset($data['pricing_range_min']) ? $data['pricing_range_min'] : '';
$pricing_range_max = isset($data['pricing_range_max']) ? $data['pricing_range_max'] : '';
$pricing_range_step = isset($data['pricing_range_step']) ? $data['pricing_range_step'] : '';
$pricing_custom = isset($data['pricing_custom']) ? $data['pricing_custom'] : '';
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
                    <th><span title="For The products configured to retrieve pricing information from pricimizer global settings."><i class="fa fa-info-circle"></i> <b>Default pricing model:</b></span></th>
                </tr>
                <tr class="alternate">
                    <td style="padding-left:40px">
                       <label for="range">
                            <input class="pricimizer_stock_price" type="radio" name="pricing_model" id="range" value="range" <?php echo esc_html($pricing_model) == 'range' ? 'checked' : '' ?> required>
                            <span>Range</span>
                        </label>

                        <label for="custom_price" style="margin-left:30px">
                            <input class="pricimizer_stock_price" type="radio" name="pricing_model" id="custom_price" value="custom_price" <?php echo esc_html($pricing_model) == 'custom_price' ? 'checked' : '' ?> required>
                            <span>Custom Price</span>
                        </label>
                    </td>
                </tr>

                <tr class="range prici_setting" <?php echo esc_html($pricing_model) == 'range' ? '' : 'style="display: none;"'?>>
                    <th style="padding-left:40px"><b>Set range prices:</b></th>
                </tr>
                <tr class="alternate price_range range prici_setting" <?php echo esc_html($pricing_model) == 'range' ? '' : 'style="display: none;"'?>>
                    <td style="padding-left:40px">
                        <div class="col-3">
                            <label>
                                <span>Min:</span>
                                <input type="number" name="pricing_range_min" id="pricing_range_min" placeholder="Min" value="<?php echo esc_html($pricing_range_min); ?>" min="0" required>
                            </label>
                        </div>
                        <div class="col-3">
                            <label>
                                <span>Step:</span>
                                <input type="number" name="pricing_range_step" id="pricing_range_step" placeholder="Step" value="<?php echo esc_html($pricing_range_step); ?>" min="0" required>
                            </label>
                        </div>
                        <div class="col-3">
                            <label>
                                <span>Max:</span>
                                <input type="number" name="pricing_range_max" id="pricing_range_max" placeholder="Max" value="<?php echo esc_html($pricing_range_max); ?>" min="0" required>
                            </label>
                        </div>
                    </td>
                </tr>

                <tr class="custom_price prici_setting" <?php echo esc_html($pricing_model) == 'custom_price' ? '' : 'style="display: none;"'?>>
                    <th style="padding-left:40px"><b>Set Custom Prices:</b> <small>(Comma separated)</small></th>
                </tr>
                <tr class="alternate custom_price prici_setting" <?php echo esc_html($pricing_model) == 'custom_price' ? '' : 'style="display: none;"'?>>
                    <td style="padding-left:40px">
                        <input type="text" name="pricing_custom" id="pricing_custom" placeholder="Custom Prices" value="<?php echo esc_html($pricing_custom); ?>" required>
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