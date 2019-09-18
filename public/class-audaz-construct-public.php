<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/nikoz84
 * @since      1.0.0
 *
 * @package    Audaz_Construct
 * @subpackage Audaz_Construct/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Audaz_Construct
 * @subpackage Audaz_Construct/public
 * @author     Nicolás Romero <nikoz.1984@gmail.com>
 */
class Audaz_Construct_Public
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Audaz_Construct_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Audaz_Construct_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		//wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/app.3984a265.css', array(), $this->version, 'all');
		//wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'dist/css/app.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Audaz_Construct_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Audaz_Construct_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$public = plugin_dir_url(__FILE__);
		//wp_register_script('vendor', $public . 'dist/js/chunk-vendors.js', '', '', true);
		//wp_enqueue_script('vendor');
		//wp_enqueue_script($this->plugin_name, $public . 'dist/app.js', ['vendor'], $this->version, true);
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'dist/app.js', '', $this->version, true);
		
	}
	/**
	 * Adiciona Cors Header
	 *
	 * @return void
	 */
	public function add_cors_http_header()
	{
		header("Access-Control-Allow-Origin: *");
	}
	public function add_route_api()
	{
		register_rest_route('api-v1', '/orcamento', [
			'methods' => WP_REST_Server::READABLE,
			'callback' => __CLASS__ . '::orcamento_api'
		]);
	}
	public function add_route_send_mail()
	{
		register_rest_route('api-v1', '/orcamento', [
			'methods' => WP_REST_Server::CREATABLE,
			'callback' => __CLASS__ . '::send_email'
		]);
	}
	static function send_email( WP_REST_Request $request )
	{
		$data = $request->get_params();

		$attachments = $data['arquivo_projeto'] ? $data['arquivo_projeto'] : [];
		$reply_to = $data['email'];
		$headers = "Content-Type: text/html; charset=UTF-8; Reply-To: {$reply_to}";
		$body = self::html_email($data);
		$subject = 'Novo orçamento enviado.';
		$send_to = get_option('admin_email');
		
		$email_response = wp_mail($send_to, $subject, $body, $headers, $attachments);

		if($email_response){
			$response = new WP_REST_Response(
				[
					'message' => 'E-mail enviado com sucesso!',
					'success' => true
				]);
			$response->set_status(200);
			return $response;
		}
		
	}	
	static function html_email($data)
	{
		$servico = $data['servico'];
		$tipo_projeto = $data['tipo_projeto'];
		$tipo_emprendimento = $data['tipo_emprendimento'];
        $possui_projeto = $data['possui_projeto'];
        $deseja_contratar = $data['deseja_contratar'];
        $nome =  $data['nome'];
        $email = $data['email'];
		$telefone = $data['telefone'];
		$site_name = get_option( 'blogname' );
		$body = "<div>
				<h3>Orçamneto enviado desde {$site_name}</h3>
				<p><strong>Serviço:</strong> {$servico} </p><br/>
				<p><strong>Tipo de Projeto:</strong> {$tipo_projeto}</p><br/>
				<p><strong>Possui Projeto:</strong> {$possui_projeto} </p><br/>
				<p><strong>Deseja Contratar Conosco:</strong> {$deseja_contratar} </p><br/>
				<p><strong>Tipo Emprendimento:</strong> {$tipo_emprendimento} </p><br/>
				<h3>Dados Pessoais</h3>
				<p><strong>Nome:</strong> {$nome} </p><br/>
				<p><strong>E-mail:</strong> {$email}</p><br/>
				<p><strong>Telefone:</strong>{$telefone}</p><br/>
			</div>";
		return $body;
	}
	static function orcamento_api()
	{
		$data = include(AUDAZ_PLUGIN_PATH . '/includes/configs.php');

		$response = new WP_REST_Response($data);
		$response->set_status(200);
		return $response;
	}
	public function add_div_vue_app($the_content)
	{
		$content = '<div id="app"></div>' . $the_content;

		return $the_content;
	}
}
