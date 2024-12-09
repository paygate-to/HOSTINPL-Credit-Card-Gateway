<?php
class moonpayController extends Controller {
    public function index() {
        $this->load->model('users');
        $this->load->model('invoices');
        $this->load->model('waste');
        
        if($this->request->server['REQUEST_METHOD'] == 'GET') {
            $invid = $this->request->get['invoice_id'];
            $value_coin = $this->request->get['value_coin'];
            
            if(empty($invid)) {
                return "Error: Invalid invoice ID";
            }
            
            $invoice = $this->invoicesModel->getInvoiceById($invid);
            if($invoice['invoice_status'] == 0) {
                $userid = $invoice['user_id'];
                
                if($value_coin > 50){
                    $this->usersModel->updateUser($userid, array('user_promised_pay' => 0));
                }
                
                $wasteData = array(
                    'user_id' => $userid,
                    'waste_ammount' => $value_coin,
                    'waste_status' => 0,
                    'waste_usluga' => "Пополнение баланса пользователя",
                );
                $this->wasteModel->createWaste($wasteData);
    
                $this->usersModel->upUserBalance($userid, $value_coin);
                
                $bonus_percent = $this->config->bonus_percent;
                $getbonus = ($value_coin * (1 + $bonus_percent / 100)) - $value_coin;
                $this->usersModel->upUserBonuses($userid, $getbonus);
                
                $this->invoicesModel->updateInvoice($invid, array('invoice_status' => 1));
                return $invid . "|success";
            } else {
                return "ERROR PAY$invid\n";
            }
        } else {
            return "Error: Invalid request method!";
        }
    }
}
?>