<?php
class payController extends Controller {
	public function index() {
		$this->document->setActiveSection('account');
		$this->document->setActiveItem('pay');
		
		if(!$this->user->isLogged()) {
			$this->session->data['error'] = "Вы не авторизированы!";
			$this->response->redirect($this->config->url . 'account/login');
		}
		if($this->user->getAccessLevel() < 0) {
			$this->session->data['error'] = "У вас нет доступа к данному разделу!";
			$this->response->redirect($this->config->url);
		}
		$this->load->model('users');
		$wert = $this->config->wert;
		$mercuryo = $this->config->mercuryo;
		$alchemypay = $this->config->alchemypay;
		$moonpay = $this->config->moonpay;
		$this->data['wert'] = $wert;
		$this->data['mercuryo'] = $mercuryo;
		$this->data['alchemypay'] = $alchemypay;
		$this->data['moonpay'] = $moonpay;
		$this->getChild(array('common/header', 'common/footer'));
		return $this->load->view('account/pay', $this->data);
	}
	
	public function wert() {
    if(!$this->user->isLogged()) {  
        $this->data['status'] = "error";
        $this->data['error'] = "Вы не авторизированы!";
        return json_encode($this->data);
    }
    if($this->user->getAccessLevel() < 1) {
        $this->data['status'] = "error";
        $this->data['error'] = "У вас нет доступа к данному разделу!";
        return json_encode($this->data);
    }
    
    $this->load->model('invoices');

    if($this->request->server['REQUEST_METHOD'] == 'POST') {
        if($this->config->wert == 1) {
            $amount = number_format($this->request->post['ammount'], 2, '.', '');
            $walletAddress = $this->config->wert_wallet;
            $userId = $this->user->getId();
            $email = $this->user->getEmail();
            
            $invoiceData = array(
                'user_id' => $userId,
                'invoice_ammount' => $amount,
                'invoice_status' => 0,
                'system' => "Wert"
            );
            $invId = $this->invoicesModel->createInvoice($invoiceData);
            
            $callbackUrl = "http://" . $_SERVER['HTTP_HOST'] . "/result/wert?invoice_id=" . $invId;
            
            // Generate payment wallet
            $walletResponse = file_get_contents('https://api.paygate.to/control/wallet.php?address=' . $walletAddress .'&callback=' . urlencode($callbackUrl));
            $walletData = json_decode($walletResponse, true);
            
            if (!$walletData || !isset($walletData['address_in'])) {
                $this->data['status'] = "error";
                $this->data['error'] = "Error generating payment wallet";
                return json_encode($this->data);
            }
            
           $paymentUrl = 'https://checkout.paygate.to/process-payment.php?address=' . $walletData['address_in'] . '&amount=' . $amount . '&provider=wert&email=' . urlencode($email) . '&currency=USD';
            
            $this->data['status'] = "success";
            $this->data['url'] = $paymentUrl;
            
        } else {
            $this->data['status'] = "error";
            $this->data['error'] = "Данная платежная система отключена!";
        }
    }
    return json_encode($this->data);
}

public function moonpay() {
    if(!$this->user->isLogged()) {  
        $this->data['status'] = "error";
        $this->data['error'] = "Вы не авторизированы!";
        return json_encode($this->data);
    }
    if($this->user->getAccessLevel() < 1) {
        $this->data['status'] = "error";
        $this->data['error'] = "У вас нет доступа к данному разделу!";
        return json_encode($this->data);
    }
    
    $this->load->model('invoices');

    if($this->request->server['REQUEST_METHOD'] == 'POST') {
        if($this->config->moonpay == 1) {
            $amount = number_format($this->request->post['ammount'], 2, '.', '');
            $walletAddress = $this->config->moonpay_wallet;
            $userId = $this->user->getId();
            $email = $this->user->getEmail();
            
            $invoiceData = array(
                'user_id' => $userId,
                'invoice_ammount' => $amount,
                'invoice_status' => 0,
                'system' => "Wert"
            );
            $invId = $this->invoicesModel->createInvoice($invoiceData);
            
            $callbackUrl = "http://" . $_SERVER['HTTP_HOST'] . "/result/moonpay?invoice_id=" . $invId;
            
            // Generate payment wallet
            $walletResponse = file_get_contents('https://api.paygate.to/control/wallet.php?address=' . $walletAddress .'&callback=' . urlencode($callbackUrl));
            $walletData = json_decode($walletResponse, true);
            
            if (!$walletData || !isset($walletData['address_in'])) {
                $this->data['status'] = "error";
                $this->data['error'] = "Error generating payment wallet";
                return json_encode($this->data);
            }
            
           $paymentUrl = 'https://checkout.paygate.to/process-payment.php?address=' . $walletData['address_in'] . '&amount=' . $amount . '&provider=moonpay&email=' . urlencode($email) . '&currency=USD';
            
            $this->data['status'] = "success";
            $this->data['url'] = $paymentUrl;
            
        } else {
            $this->data['status'] = "error";
            $this->data['error'] = "Данная платежная система отключена!";
        }
    }
    return json_encode($this->data);
}

public function mercuryo() {
    if(!$this->user->isLogged()) {  
        $this->data['status'] = "error";
        $this->data['error'] = "Вы не авторизированы!";
        return json_encode($this->data);
    }
    if($this->user->getAccessLevel() < 1) {
        $this->data['status'] = "error";
        $this->data['error'] = "У вас нет доступа к данному разделу!";
        return json_encode($this->data);
    }
    
    $this->load->model('invoices');

    if($this->request->server['REQUEST_METHOD'] == 'POST') {
        if($this->config->mercuryo == 1) {
            $amount = number_format($this->request->post['ammount'], 2, '.', '');
            $walletAddress = $this->config->mercuryo_wallet;
            $userId = $this->user->getId();
            $email = $this->user->getEmail();
            
            $invoiceData = array(
                'user_id' => $userId,
                'invoice_ammount' => $amount,
                'invoice_status' => 0,
                'system' => "Wert"
            );
            $invId = $this->invoicesModel->createInvoice($invoiceData);
            
            $callbackUrl = "http://" . $_SERVER['HTTP_HOST'] . "/result/mercuryo?invoice_id=" . $invId;
            
            // Generate payment wallet
            $walletResponse = file_get_contents('https://api.paygate.to/control/wallet.php?address=' . $walletAddress .'&callback=' . urlencode($callbackUrl));
            $walletData = json_decode($walletResponse, true);
            
            if (!$walletData || !isset($walletData['address_in'])) {
                $this->data['status'] = "error";
                $this->data['error'] = "Error generating payment wallet";
                return json_encode($this->data);
            }
            
           $paymentUrl = 'https://checkout.paygate.to/process-payment.php?address=' . $walletData['address_in'] . '&amount=' . $amount . '&provider=mercuryo&email=' . urlencode($email) . '&currency=USD';
            
            $this->data['status'] = "success";
            $this->data['url'] = $paymentUrl;
            
        } else {
            $this->data['status'] = "error";
            $this->data['error'] = "Данная платежная система отключена!";
        }
    }
    return json_encode($this->data);
}

public function alchemypay() {
    if(!$this->user->isLogged()) {  
        $this->data['status'] = "error";
        $this->data['error'] = "Вы не авторизированы!";
        return json_encode($this->data);
    }
    if($this->user->getAccessLevel() < 1) {
        $this->data['status'] = "error";
        $this->data['error'] = "У вас нет доступа к данному разделу!";
        return json_encode($this->data);
    }
    
    $this->load->model('invoices');

    if($this->request->server['REQUEST_METHOD'] == 'POST') {
        if($this->config->alchemypay == 1) {
            $amount = number_format($this->request->post['ammount'], 2, '.', '');
            $walletAddress = $this->config->alchemypay_wallet;
            $userId = $this->user->getId();
            $email = $this->user->getEmail();
            
            $invoiceData = array(
                'user_id' => $userId,
                'invoice_ammount' => $amount,
                'invoice_status' => 0,
                'system' => "Wert"
            );
            $invId = $this->invoicesModel->createInvoice($invoiceData);
            
            $callbackUrl = "http://" . $_SERVER['HTTP_HOST'] . "/result/alchemypay?invoice_id=" . $invId;
            
            // Generate payment wallet
            $walletResponse = file_get_contents('https://api.paygate.to/control/wallet.php?address=' . $walletAddress .'&callback=' . urlencode($callbackUrl));
            $walletData = json_decode($walletResponse, true);
            
            if (!$walletData || !isset($walletData['address_in'])) {
                $this->data['status'] = "error";
                $this->data['error'] = "Error generating payment wallet";
                return json_encode($this->data);
            }
            
           $paymentUrl = 'https://checkout.paygate.to/process-payment.php?address=' . $walletData['address_in'] . '&amount=' . $amount . '&provider=alchemypay&email=' . urlencode($email) . '&currency=USD';
            
            $this->data['status'] = "success";
            $this->data['url'] = $paymentUrl;
            
        } else {
            $this->data['status'] = "error";
            $this->data['error'] = "Данная платежная система отключена!";
        }
    }
    return json_encode($this->data);
}


	
	private function validatePOST() {
	
		$this->load->library('validate');
		
		$validateLib = new validateLibrary();
		
		$result = null;
		
		$ammount = @$this->request->post['ammount'];
		if(!$validateLib->money($ammount)) {
			$result = "Укажите сумму пополнения в допустимом формате!";
		}
		elseif(10 > $ammount || $ammount > 5000) {
			$result = "Укажите сумму от 10 до 5000 рублей!";
		}
		return $result;
	}
}
?>
