<?php

require_once "includes/TruemanBase.php";

if ( ! class_exists( 'TruemanThemeActivation' ) ) {
class TruemanThemeActivation {
  public $plugin_file= __FILE__;
  public $responseObj;
  public $licenseMessage;
  public $showMessage = false;
  public $slug = 'trueman';

    function __construct() {
        $licenseKey = get_option( 'Trueman_lic_Key', '' );
        $liceEmail = get_option( 'Trueman_lic_email', '' );
        $renLink = get_option( 'Trueman_lic_Ren', '' );
        $templateDir=get_template_directory();

        TruemanBase::addOnDelete( function() {
           update_option( 'Trueman_lic_Key', '' );
           update_option( 'Trueman_lic_Status', '' );
           update_option( 'Trueman_lic_Ren', '' );
        });

        if ( TruemanBase::CheckWPPlugin( $licenseKey, $liceEmail, $this->licenseMessage, $this->responseObj, $templateDir.'/style.css' ) ) {
            add_action( 'admin_post_Trueman_el_deactivate_license', [ $this, 'action_deactivate_license' ] );
            if ( $this->responseObj->is_valid ) {
    					add_filter( 'trueman/is_theme_activated', '__return_true' );
    				}
            update_option( 'Trueman_lic_Status', 'active' );
            $renSupp = (string) $this->responseObj->support_renew_link;
            $renSupp = explode( '|', $renSupp );
            if ( is_array( $renSupp ) ) {
              $renSupp = $renSupp[0];
            } else {
              $renSupp = '';
            }
            update_option( 'Trueman_lic_Ren', $renSupp );
            add_action( 'trueman_theme_dashboard_activation_form', [ $this, 'activated_form_content' ] );
        } else {
            if ( !empty( $licenseKey ) && !empty( $this->licenseMessage ) ) {
               $this->showMessage = true;
            }
            update_option( 'Trueman_lic_Status', '') || add_option( 'Trueman_lic_Status', '' );
            update_option( 'Trueman_lic_Key', '') || add_option( 'Trueman_lic_Key', '' );
            update_option( 'Trueman_lic_Ren', '') || add_option( 'Trueman_lic_Ren', '' );
            add_action( 'admin_post_Trueman_el_activate_license', [ $this, 'action_activate_license' ] );
            add_action( 'admin_notices', 'trueman_theme_activation_notice' );
            add_action( 'trueman_theme_dashboard_activation_form', [ $this, 'license_form_content' ] );
        }
    }
    function action_activate_license(){
        check_admin_referer( 'el-license' );
        $licenseKey = ! empty( $_POST['el_license_key'] ) ? $_POST['el_license_key']: '';
        $licenseEmail = ! empty( $_POST['el_license_email'] ) ? $_POST['el_license_email']: '';
        update_option( 'Trueman_lic_Key', $licenseKey ) || add_option( 'Trueman_lic_Key', $licenseKey);
        update_option( 'Trueman_lic_email', $licenseEmail ) || add_option( 'Trueman_lic_email', $licenseEmail );

        update_option( '_site_transient_update_plugins', '' );
        update_option( '_site_transient_update_themes', '' );
        wp_safe_redirect( admin_url( 'admin.php?page=' . $this->slug . '-theme-activation' ) );
    }
    function action_deactivate_license() {
        check_admin_referer( 'el-license' );
        $message = '';
        if ( TruemanBase::RemoveLicenseKey( __FILE__,$message ) ) {
            update_option( 'Trueman_lic_Key', '' ) || add_option( 'Trueman_lic_Key', '' );
            update_option( 'Trueman_lic_Status', '') || add_option( 'Trueman_lic_Status', '');

            update_option( '_site_transient_update_plugins', '' );
            update_option( '_site_transient_update_themes', '' );
        }
        wp_safe_redirect( admin_url( 'admin.php?page='.$this->slug . '-theme-activation' ) );
    }
    function activated_form_content(){
        ?>
        <div class="trueman-dashboard-activation">
          <h2><?php echo esc_html__( 'Trueman Theme is successfully activated!', 'trueman-plugin' ); ?></h2>
          <p><?php echo esc_html__( 'Check your license status and support details for Trueman theme.', 'trueman-plugin' ); ?></p>
          <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <input type="hidden" name="action" value="Trueman_el_deactivate_license"/>

            <div class="trueman-dashboard-list">
              <ul>
                <li>
                   <strong><?php echo esc_html__( 'Status:', 'trueman-plugin' );?></strong>
                   <?php if ( $this->responseObj->is_valid ) : ?>
                   <span class="el-license-valid"><?php echo esc_html__( 'Activated', 'trueman-plugin' );?></span>
                   <?php else : ?>
                   <span class="el-license-invalid"><?php echo esc_html__( 'Invalid Activated', 'trueman-plugin' ); ?></span>
                   <?php endif; ?>
                </li>
                <li>
                   <strong><?php echo esc_html__( 'License Type:', 'trueman-plugin' );?></strong>
                   <?php echo $this->responseObj->license_title; ?>
                </li>
                <li>
                   <strong><?php echo esc_html__( 'License Expired on:', 'trueman-plugin' );?></strong>
                   <?php echo $this->responseObj->expire_date; ?>
                </li>
                <li>
                   <strong><?php echo esc_html__( 'Support Expired on:', 'trueman-plugin' );?></strong>
                   <?php
                       echo $this->responseObj->support_end;
                       $renew_str = (string) $this->responseObj->support_renew_link;
                       $renew_str = explode( '|', $renew_str );

                       $renew_link = 'https://1.envato.market/' . $renew_str[0];
                       if ( !empty( $this->responseObj->support_renew_link ) ){
                        ?>
                           <a target="_blank" class="button-link" href="<?php echo esc_url( $renew_link ); ?>"><?php echo esc_html( 'Renew', 'trueman-plugin' ); ?></a>
                        <?php
                    }
                   ?>
                </li>
                <li>
                   <strong><?php echo esc_html__( 'Your License Key:', 'trueman-plugin' ); ?></strong>
                   <span class="el-license-key"><?php echo esc_attr( substr($this->responseObj->license_key,0,9)."XXXXXXXX-XXXXXXXX".substr($this->responseObj->license_key,-9) ); ?></span>
                </li>
              </ul>
              <div class="buttons">
                <?php wp_nonce_field( 'el-license' ); ?>
                <?php submit_button( esc_attr__( 'Deactivate License', 'trueman-plugin' ) ); ?>
                <a href="<?php echo esc_url( admin_url( 'admin-post.php' ) . '?action=trueman_fupc' ); ?>" class="button button-link">
                  <?php echo esc_html__( 'Check Updates', 'trueman-plugin' ); ?>
                </a>
                <a target="_blank" class="button button-link" href="https://1.envato.market/c/1790164/275988/4415?u=https://themeforest.net/item/trueman-cv-resume-wordpress-theme/37364785/support">
                  <?php echo esc_html__( 'Get Support', 'trueman-plugin' ); ?>
                </a>
              </div>
            </div>
          </form>

          <div class="notice notice-info">
              <p><?php echo sprintf( __( 'Note! You can have <strong>ONE active theme installation</strong> at a time. You can move the license to a different domain by "Deactivate License" from the active theme installation and then re-activate the theme on a different WordPress installation.', 'trueman-plugin' ) ); ?></p>
          </div>
          <p style="margin-top: 30px;"><strong><?php echo sprintf( __( 'Manage Your License', 'trueman-plugin' ) ); ?></strong></p>
          <div class="notice notice-info">
            <p><?php echo sprintf( __( 'To manage all your activation, please, register an account and login on <a href="https://licenses.bslthemes.com/" target="_blank">Bslthemes License Manager</a> using your already registered email and purchase code.', 'trueman-plugin' ) ); ?></p>
          </div>

        </div>
    <?php
    }

    function license_form_content() {
        ?>
        <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <input type="hidden" name="action" value="Trueman_el_activate_license"/>
            <div class="trueman-dashboard-activation">
                <h2><?php echo esc_html__( 'Activate Trueman Theme and Support', $this->slug );?></h3>
                <?php
                if ( !empty( $this->showMessage ) && !empty( $this->licenseMessage ) ) {
                    ?>
                    <div class="notice notice-error is-dismissible">
                        <p><?php echo esc_html__( $this->licenseMessage, 'trueman-plugin' ); ?></p>
                    </div>
                    <?php
                }
                ?>
                <p><?php echo esc_html__( 'Enter your purchase code here, to activate your copy of Trueman theme, and get access to premium support and lifetime auto theme updates.', 'trueman-plugin' );?></p>
                <p><i><?php echo sprintf( 'Not have purchase code yet? Buy now on <a href="%s" target="_blank">Envato Market</a>', 'https://1.envato.market/2r0eYQ' ); ?></i></p>
                <table>
                  <tr>
                    <th><label for="el_license_key"><?php echo esc_html__( 'Purchase Code', 'trueman-plugin' ); ?></label></th>
                    <td>
                      <input type="text" class="regular-text code" name="el_license_key" size="50" placeholder="<?php echo esc_attr__( 'xxxxxxxx-xxxxxxxx-xxxxxxxx-xxxxxxxx', 'trueman-plugin' ); ?>" required="required" />
                      <div class="description">
                        <?php echo esc_html__( 'Can\'t find the purchase code?', 'trueman-plugin' ); ?> <a target="_blank" href="https://1.envato.market/c/1790164/275988/4415?u=https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-"><?php echo esc_html__( 'Follow this guide', 'trueman-plugin' ); ?></a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th><label for="el_license_email"><?php echo esc_html__( 'Email Address', 'trueman-plugin' ); ?></label></th>
                    <td>
                      <?php
                          $purchaseEmail = get_option( 'Trueman_lic_email', get_bloginfo( 'admin_email' ) );
                      ?>
                      <input type="text" class="regular-text code" name="el_license_email" size="50" value="<?php echo esc_attr( $purchaseEmail ); ?>" placeholder="<?php echo esc_attr__( 'your-email@domain.com', 'trueman-plugin' ); ?>" required="required" />
                      <div class="description"><?php echo esc_html__( 'We will send update news of this theme by this email, don\'t worry, we hate spam', 'trueman-plugin' );?></div>
                    </td>
                  </tr>
                  <tr>
                    <th></th>
                    <td>
                      <div class="buttons">
                          <?php wp_nonce_field( 'el-license' ); ?>
                          <?php submit_button( esc_attr__( 'Submit', 'trueman-plugin' ) ); ?>
                      </div>
                    </td>
                  </tr>
                </table>

                <div class="notice notice-info">
                    <p><?php echo esc_html__( 'Note! You are not required to separately register / activated any of the plugins which are bundled with the theme.', 'trueman-plugin' ); ?></p>
                </div>
                <div class="notice notice-info">
                    <p><?php echo sprintf( __( 'Note! You can have <strong>ONE active theme installation</strong> at a time. You can move the license to a different domain by "Deactivate License" from the active theme installation and then re-activate the theme on a different WordPress installation.', 'trueman-plugin' ) ); ?></p>
                </div>
                <p style="margin-top: 30px;"><strong><?php echo sprintf( __( 'Manage Your License', 'trueman-plugin' ) ); ?></strong></p>
                <div class="notice notice-info">
                  <p><?php echo sprintf( __( 'To manage all your activation, please, register an account and login on <a href="https://licenses.bslthemes.com/" target="_blank">Bslthemes License Manager</a> using your already registered email and purchase code.', 'trueman-plugin' ) ); ?></p>
                </div>

            </div>
        </form>
        <?php
    }
}

}

new TruemanThemeActivation();
