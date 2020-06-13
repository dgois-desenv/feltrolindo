<?php 

class sfsiFacebookSocialHelper{
   
  private $url,$timeout=90;

  public function __construct(){

  }

  ////////////////////////////// HELPERS :Fb cached count  functions STARTS ///////////////

    private function sfsi_parse_fb_api_response($apiType,$apiresponseObj){

        $responseObj = new stdClass;

        $responseObj->url     = isset($apiresponseObj->id) && !empty($apiresponseObj->id) ? $apiresponseObj->id : '';
        $responseObj->c       = 0; // $responseObj->c represent count
        $responseObj->og_object = isset($apiresponseObj->og_object) && !empty($apiresponseObj->og_object) ? (is_object($apiresponseObj->og_object) ? $apiresponseObj->og_object->id: $apiresponseObj->og_object['id']) : '';
        
        switch ($apiType) {

          case "app29": case "app27":

            if (isset($apiresponseObj->engagement)){
              
              $apiresponseObj->engagement = is_object($apiresponseObj->engagement) ? $apiresponseObj->engagement: (object) $apiresponseObj->engagement;


              $responseObj->c = $apiresponseObj->engagement->reaction_count + $apiresponseObj->engagement->comment_count
                        + $apiresponseObj->engagement->share_count + $apiresponseObj->engagement->comment_plugin_count;
            }

            break;

          default:
            
            if (isset($apiresponseObj->share) && isset($apiresponseObj->share['share_count'])){

              $responseObj->c = $apiresponseObj->share['share_count'];

            }

          break;
        }

        return $responseObj;
    }

    public function sfsi_get_all_siteurls($arrPostids=false){

        $arrUrl  = array_unique(sfsi_premium_get_all_site_urls($arrPostids));

        if($this->sfsi_isfbCumulationCountOn() && !empty($arrUrl) ){

          $arrCumulativeUrls = array();

          foreach ($arrUrl as $key => $url):
                      
              if("https" == parse_url($url, PHP_URL_SCHEME)){

                  $httpsUrl = $url;
                  $httpUrl  = preg_replace("/^https:/i", "http:", $url);

                  array_push($arrCumulativeUrls,$httpUrl,$httpsUrl);
              }

              // $httpUrl   = $url;
              // $httpsUrl  = preg_replace("/^http:/i", "https:", $url);
              //array_push($arrCumulativeUrls,$httpUrl,$httpsUrl);

          endforeach;

          $arrCumulativeUrls = empty($arrCumulativeUrls) ? $arrUrl : $arrCumulativeUrls;

          return $arrCumulativeUrls;

        }

        return $arrUrl;
    }

  ////////////////////////////// HELPERS:Fb cached count  functions CLOSES ///////////////

  ////////////////////////////// MODELS : Fb cached count  functions STARTS ///////////////

    public function sfsi_isFbCachingActive($option4=false){
        
        $isFbCachingActive  = false;

        $option4      =  (false != $option4 && is_array($option4)) ? $option4 : unserialize(get_option('sfsi_premium_section4_options',false));

        $option1      =  unserialize(get_option('sfsi_premium_section1_options',false));

        if(isset($option1['sfsi_plus_facebook_display']) && !empty($option1['sfsi_plus_facebook_display'])
          && isset($option4['sfsi_plus_display_counts']) && !empty($option4['sfsi_plus_display_counts']) 
          && isset($option4['sfsi_plus_facebook_countsDisplay']) && !empty($option4['sfsi_plus_facebook_countsDisplay'])
          && "yes" == $option1['sfsi_plus_facebook_display'] && "yes" == $option4['sfsi_plus_display_counts'] && "yes" == $option4['sfsi_plus_facebook_countsDisplay']){

          $isFbCachingActive  = (isset($option4['sfsi_plus_fb_count_caching_active']) && !empty($option4['sfsi_plus_fb_count_caching_active']))? $option4['sfsi_plus_fb_count_caching_active']: 'no';

          $isFbCachingActive =  "yes" == strtolower($isFbCachingActive) ? true : false;

        }
   
        return $isFbCachingActive;        
    }

    public function sfsi_get_fb_access_token($option4=false){
     
        $access_token = '';

        $option4      =  (false != $option4 && is_array($option4)) ? $option4 : unserialize(get_option('sfsi_premium_section4_options',false)) ;

        $appid        = (isset($option4['sfsi_plus_facebook_appid']) && !empty($option4['sfsi_plus_facebook_appid']))? $option4['sfsi_plus_facebook_appid']: '954871214567352';

        $appsecret    = (isset($option4['sfsi_plus_facebook_appsecret']) && !empty($option4['sfsi_plus_facebook_appsecret']))? $option4['sfsi_plus_facebook_appsecret']: 'a780eb3d3687a084d6e5919585cc6a12';

        $access_token= $appid.'|'.$appsecret;

        return $access_token;
    }

    public function sfsi_isfbCumulationCountOn(){

        $isfbCumulationCountOn = false;

        $option5    = unserialize(get_option('sfsi_premium_section5_options',false));        

        if(isset($option5['sfsi_plus_facebook_cumulative_count_active']) 
          
          && !empty($option5['sfsi_plus_facebook_cumulative_count_active']) 
          
          && $option5['sfsi_plus_facebook_cumulative_count_active']=="yes"){

          $isfbCumulationCountOn = true;
        }

        //return $isfbCumulationCountOn;
        return $isfbCumulationCountOn && sfsi_is_ssl();
    }

    public function sfsi_get_fb_caching_interval($option4=false){
     
        $caching_interval = 1;

        $option4      =  (false != $option4 && is_array($option4)) ? $option4 : unserialize(get_option('sfsi_premium_section4_options',false)) ;

        if($this->sfsi_isFbCachingActive($option4) && isset($option4['sfsi_plus_fb_caching_interval']) && !empty($option4['sfsi_plus_fb_caching_interval'])){

          $caching_interval  = $option4['sfsi_plus_fb_caching_interval'];

        }

        return $caching_interval;
    }

    public function sfsi_get_fb_api_last_call_log(){

        $data           = get_option('sfsi_premium_fb_batch_api_last_call_log',false);

        $arrApiCallData = isset($data) && !empty($data) && is_string($data) ? (object) unserialize($data) : false;
        
        return $arrApiCallData;
    }

    private function sfsi_update_fb_api_call_log(){
        
        $arrApiCallData = $this->sfsi_get_fb_api_last_call_log();
        
        $fbApiCounter   = 99;

        if(isset($arrApiCallData) && !empty($arrApiCallData) && isset($arrApiCallData->apicount) && !empty($arrApiCallData->apicount)){
          
          $fbApiCounter = $arrApiCallData->apicount + 99;
        }

        $apidata = array(
            "apicount"    => $fbApiCounter,
            "lastapicall" => time()
        );
        update_option('sfsi_premium_fb_batch_api_last_call_log',serialize($apidata));
    }

    public function sfsi_get_cached_data_fbcount($isfbCumulationCountOn=null){

        $arrResult = array();

        if(null === $isfbCumulationCountOn){
          $isfbCumulationCountOn = $this->sfsi_isfbCumulationCountOn();
        }

        $key  = false === $isfbCumulationCountOn ?  
                'sfsi_premium_fb_uncumulative_cached_count_'.home_url():
                'sfsi_premium_fb_cumulative_cached_count_'.home_url();

        $jsonData = get_option($key,false);

        if(false != $jsonData):

          $arrFbCount = json_decode($jsonData,true);

          if (JSON_ERROR_NONE === json_last_error()):

            $arrResult = $arrFbCount;

          endif;

        endif;

        return $arrResult;
    }

    public function sfsi_update_cached_data_fbcount($arrData,$dbKey=false,$isfbCumulationCountOn=null){

        if(false == $dbKey){

          if(null === $isfbCumulationCountOn){
            $isfbCumulationCountOn = $this->sfsi_isfbCumulationCountOn();            
          }

          $dbKey  = false === $isfbCumulationCountOn ? 
                'sfsi_premium_fb_uncumulative_cached_count_'.home_url(): 
                'sfsi_premium_fb_cumulative_cached_count_'.home_url();
        }

        if(isset($arrData) && !empty($arrData) && is_array($arrData)){
          update_option($dbKey,utf8_encode(json_encode($arrData)));         
        }
    }

    private function sfsi_save_multiple_url_facebook_count_for_caching($apiType,$arrJsonResponse){

        if(isset($arrJsonResponse) && !empty($arrJsonResponse) && is_array($arrJsonResponse)){

          $arrFinalResponse = array();

           foreach($arrJsonResponse as $json_response):
              
             if(isset($json_response) && !empty($json_response)){
               
               $responseArr      = json_decode($json_response,true); 

               $arrFinalResponse = array_merge($arrFinalResponse,$responseArr);
             
             }

           endforeach;

           $this->sfsi_process_facebook_count_for_caching($apiType,$arrFinalResponse,true);
        }
    }

    public function sfsi_process_fbcount_data_to_add_in_final_arr($url=null,$count,$arrDbFbCachedCount,$postId=null){

        if(is_null($postId)){
          $postId  = sfsi_premium_url_to_postid($url);
          $postId  = isset($postId) && !empty($postId) ? $postId: -1;          
        }

        $arrDbPostIds = isset($arrDbFbCachedCount) && !empty($arrDbFbCachedCount) && is_array($arrDbFbCachedCount) ? array_column($arrDbFbCachedCount,"i") : array();

        $dbIndex = null;

        if(isset($arrDbPostIds) && !empty($arrDbPostIds)){

            $dbIndex = array_search($postId,$arrDbPostIds);
            $dbIndex = false === $dbIndex ? null : $dbIndex;

            if($dbIndex > 0 || $dbIndex === 0){

                $arrDbFbCachedCount[$dbIndex]['i'] = $postId; 
                $arrDbFbCachedCount[$dbIndex]['c'] = $count;
            }
        }

        if(is_null($dbIndex)){
              $arrCountData      = array();
              $arrCountData['i'] = $postId; 
              $arrCountData['c'] = $count;
              array_push($arrDbFbCachedCount, $arrCountData);
        }
        
        return $arrDbFbCachedCount;
    }

    private function sfsi_process_facebook_count_for_caching($apiType,$json_response,$isResponseArr=false)
    {        
        $arrDbFbCachedCount = false;
        
        if($isResponseArr)
        {
          $responseArr  = $json_response;
        }
        else
        {
          $responseArr  = isset($json_response) && !empty($json_response) ? json_decode($json_response,true) :  array();
        }    

        if(isset($responseArr) && !empty($responseArr)):

              $isfbCumulationCountOn = $this->sfsi_isfbCumulationCountOn();

              $arrDbFbCachedCount    = $this->sfsi_get_cached_data_fbcount();

              foreach ($responseArr as $url => $singleRespArr):
                
                $singleRespObj = sfsi_premium_arrayToObject($singleRespArr);

                if(!isset($singleRespObj->error)):

                  if(false != $isfbCumulationCountOn)
                  {   
                      if("http" == parse_url($url, PHP_URL_SCHEME)):
                        
                        $httpsUrl = preg_replace("/^http:/i", "https:", $url);
                        
                        // Count for http url
                        $httpUrlCountDataObj  = sfsi_premium_arrayToObject($responseArr[$url]);
                        $data = array($httpUrlCountDataObj);

                        // Count for https url
                        if(isset($responseArr[$httpsUrl]))
                        {
                          $httpsUrlCountDataObj = sfsi_premium_arrayToObject($responseArr[$httpsUrl]);
                          $data                 = array($httpUrlCountDataObj,$httpsUrlCountDataObj);
                        }

                        $arrResp = array(
                            "api" => $apiType,
                            "data"=> $data
                        );

                        $cumulativeObj        = new sfsiCumulativeCount($url,$httpsUrl);         
                        $count                = $cumulativeObj->sfsi_count_cumulative($arrResp);
                        
                        if(0 != $count){

                          $arrDbFbCachedCount = $this->sfsi_process_fbcount_data_to_add_in_final_arr($httpsUrl,$count,$arrDbFbCachedCount);

                        }

                      endif;
                  }

                  else{

                        $objUnCumulative     = $this->sfsi_parse_fb_api_response($apiType,$singleRespObj);

                        if(false != $objUnCumulative && is_object($objUnCumulative) && 0 != $objUnCumulative->c){
                          
                            $arrDbFbCachedCount = $this->sfsi_process_fbcount_data_to_add_in_final_arr($objUnCumulative->url,$objUnCumulative->c,$arrDbFbCachedCount);
                        }
                  }

                endif;

              endforeach;

        endif;

        if(isset($arrDbFbCachedCount) && !empty($arrDbFbCachedCount) && is_array($arrDbFbCachedCount) ){
          $this->sfsi_update_cached_data_fbcount($arrDbFbCachedCount);          
        }

    }

    /*
      Parameters: (3) -> (int) $postId Post ID.Required: Yes
      Returns:    -> (int) On success will return cached fb count Default: 0
    */

      public function sfsi_get_cached_fbcount_for_postId($postId){
        
          $count = 0;

          if(isset($postId)){

            $arrFbCachedCount = $this->sfsi_get_cached_data_fbcount();

            if(isset($arrFbCachedCount) && !empty($arrFbCachedCount))
            {
                $arrFbCachedPostIds = array_column($arrFbCachedCount,'i');

                $key   = array_search($postId,$arrFbCachedPostIds);

                if(false !== $key){
                    $count = $arrFbCachedCount[$key]['c'];          
                }
            }

          }
          
          return $count;
      }

    private function sfsi_add_api_error_log($message){

          $jsonApiIssues = get_option('sfsi_premium_fb_batch_api_issue',false);
          $arrApiIssues  = array();

          if(false != $jsonApiIssues){

              $arrDbApiIssues = json_decode($jsonApiIssues,true);

              if(JSON_ERROR_NONE === json_last_error()){
                $arrApiIssues = $arrDbApiIssues;
              }
          }

          $arrErrData = array(
            "time"    => time(),
            "message" => $message
          );

          array_push($arrApiIssues,$arrErrData);
          update_option('sfsi_premium_fb_batch_api_issue',json_encode($arrApiIssues));        
    }

  /////////////////////////////////////// CONTROLLERS :Fb cached count model functions CLOSES /////////////////////////////

  public function sfsi_shall_call_fbcount_batch_api(){

      $shallCallFbCountApi = false;

      if(false != $this->sfsi_isFbCachingActive()):
        
        $arrApiCallData = $this->sfsi_get_fb_api_last_call_log();

        $lastapicallTimestamp = isset($arrApiCallData->lastapicall) && !empty($arrApiCallData->lastapicall) ? $arrApiCallData->lastapicall : false;

        if(false == $lastapicallTimestamp){

          $shallCallFbCountApi = true;

        }

        else{
          
          $setInterval = $this->sfsi_get_fb_caching_interval();
          $setInterval = isset($setInterval) && !empty($setInterval) ? $setInterval: 1;

          $diff   = (time() - $lastapicallTimestamp)/ 3600;   // 1 hr
          //$diff = (time() - $lastapicallTimestamp)/ 86400; //  24 hrs
          //$diff = time()  - $lastapicallTimestamp;

          $shallCallFbCountApi = ($diff >= $setInterval) ? true :false;

        }

      endif;

      return $shallCallFbCountApi;    
  }

  public function sfsi_fbcount_inbatch_api(){
        
      try {
        
        if(false != $this->sfsi_shall_call_fbcount_batch_api()):

            $arrAllPostIds  = sfsi_premium_get_all_site_postids();
            $access_token   = $this->sfsi_get_fb_access_token();

            $sfsi_job_queue = sfsiJobQueue::getInstance();

            // Call for remaining urls for pending api calls            
            $arrPendingJobs = $sfsi_job_queue->get_pending_jobs();

            if(isset($arrPendingJobs) && !empty($arrPendingJobs)){

                 $getTopJob = $arrPendingJobs[0];

                 if(isset($getTopJob) && !empty($getTopJob) && false == $getTopJob->status):

                   $arrPostids = json_decode($getTopJob->urls,true);

                   if(JSON_ERROR_NONE === json_last_error()):

                     // For backward compatibility as urls were saved in job data instead of postids
                     $arrUrls = filter_var($arrPostids[0], FILTER_VALIDATE_URL) ? $arrPostids: $this->sfsi_get_all_siteurls($arrPostids);                    

                     $jobId   = $getTopJob->id;
                     $this->sfsi_fbcount_multiple_batch_api($jobId,$arrUrls,$access_token);

                   endif;

               endif;
            }

            else if(isset($arrAllPostIds) && !empty($arrAllPostIds)):

                $chunkByCounter = $this->sfsi_isfbCumulationCountOn() ? 2475 : 4950;            

                $postCount      = count($arrAllPostIds);

                if($postCount>50){

                  if($postCount > $chunkByCounter):
                      
                      //call api for first 4950 urls & put others in queue to be called in next hour 
                       $arrChunked     =  array_chunk($arrAllPostIds, $chunkByCounter);

                       // Add remmaining job with not started status
                       $arrJobIds = $sfsi_job_queue->add_multiple_jobs(1,$arrChunked);

                       // if(!empty($arrJobIds)):

                       //    $jobId        = $arrJobIds[0];
                       //    $arrFjPostids = $arrChunked[0];

                       //    $arrFJUrls = $this->sfsi_get_all_siteurls($arrFjPostids);
                       //    $sfsi_job_queue->job_start($jobId);
                          
                       //    $this->sfsi_fbcount_multiple_batch_api($jobId,$arrFJUrls,$access_token);

                       // endif;


                  else:

                        // Create job
                        $arrAllUrls  = $this->sfsi_get_all_siteurls($arrAllPostIds);
                        $jsonPostIds = json_encode($arrAllPostIds);

                        if (JSON_ERROR_NONE === json_last_error()){
                          
                          $jobId = $sfsi_job_queue->add_single_job(1,$jsonPostIds);
                          
                          if(isset($jobId) && !empty($jobId)):

                            $sfsi_job_queue->job_start($jobId);

                            $this->sfsi_fbcount_multiple_batch_api($jobId,$arrAllUrls,$access_token);

                          endif;

                        }
                  
                  endif;

                }
            
                else{

                    $arrAllUrls  = $this->sfsi_get_all_siteurls($arrAllPostIds);
                    $this->sfsi_fbcount_single_batch_api($arrAllUrls,$access_token);          
                }

            endif; // arrAllPostIds count >0

        endif;
      
      }      
      //catch exception
      catch(Exception $e) {
          $this->sfsi_add_api_error_log($e->getMessage());
      }

  }   

  public function sfsi_get_api_url_array_multiple_batch_api($arrUrl,$access_token){

       $arrUrl = array_chunk($arrUrl, 50);

       $arrApiUrl =  array();

       foreach($arrUrl as $arrData):

        $arrJsonn    = json_encode($arrData);
        $apiUrl      = 'https://graph.facebook.com/v3.0/?ids='.$arrJsonn.'&fields=engagement,og_object{id}&access_token='.$access_token;

        array_push($arrApiUrl,$apiUrl);

       endforeach;

       return $arrApiUrl;
  }

  public function sfsi_fbcount_multiple_batch_api($jobId,$arrUrl,$access_token){

      $arrApiUrl = $this->sfsi_get_api_url_array_multiple_batch_api($arrUrl,$access_token);

      if(!empty($arrApiUrl)){

          // Calling api
          $sfsiCumulativeCount = new sfsiCumulativeCount();

          $resp = $sfsiCumulativeCount->sfsi_get_multi_curl($arrApiUrl,array(),true);

          if(isset($resp) && !empty($resp)){

             $sfsi_job_queue = sfsiJobQueue::getInstance();

              // Update call log, last call time & increase counter
              $this->sfsi_update_fb_api_call_log();

              $sfsi_job_queue->remove_finished_job($jobId);
              
              $respObj  = json_decode($resp[0]);

              if(!isset($respObj->error)){

                  $this->sfsi_save_multiple_url_facebook_count_for_caching("app29",$resp);

              }
              
              else{
                  
                  $this->sfsi_add_api_error_log($respObj->error->message);

              }

          }

      }

  }

  public function sfsi_fbcount_single_batch_api($arrUrl,$access_token){
       
     $arrJson = json_encode($arrUrl);

     $apiUrl  = 'https://graph.facebook.com/v3.0/?ids='.$arrJson.'&fields=engagement,og_object{id}&access_token='.$access_token;

     $request  = wp_remote_get( $apiUrl );
     $response = wp_remote_retrieve_body( $request );
    
     if (200 == wp_remote_retrieve_response_code($request)):

       $this->sfsi_process_facebook_count_for_caching("app29",$response); 

       update_option('sfsi_premium_fb_batch_api_issue','');

     endif;

      // Update call log, last call time & increase counter
      $this->sfsi_update_fb_api_call_log();       

  }

  public function sfsi_get_uncachedfbcount($url){
      
      $count = 0;

       if($this->sfsi_isfbCumulationCountOn()):

        $count = $this->sfsi_get_uncached_cumulative_fb($url);
       
       else:
        
        $count = $this->sfsi_get_uncached_uncumulative_fb($url);
      
      endif;

      return $count;  
  }

  /* get facebook likes */
  public function sfsi_get_uncached_cumulative_fb($url){            

    $decoded_url = urldecode($url);

    if (strpos($decoded_url, '?') !== false && substr($decoded_url, -1) ==="/") {
        $decoded_url = substr($decoded_url, 0, -1);
    }

    $httpUrl        = urlencode(preg_replace("/^https:/i", "http:", $decoded_url));
    $httpsUrl       = urlencode($decoded_url);

    $access_token   = $this->sfsi_get_fb_access_token();

    $objCumulative  = new sfsiCumulativeCount($httpUrl,$httpsUrl,$access_token);

    // if($_SERVER['REMOTE_ADDR']=="35.197.82.82"){
    $response_arr = $objCumulative->sfsi_fb_api("app29");

    if(empty($response_arr)){

         $json_string = $this->file_get_contents_curl('https://graph.facebook.com/?ids='.json_encode([$httpUrl,$httpsUrl]));
         $jsonMulti   = json_decode($json_string, true);
         $count       = 0;

         if(isset($jsonMulti) && !empty($jsonMulti)){

           foreach($jsonMulti as $url=> $json){

               $count  += (isset($json['share'])?($json['share']['share_count']+$json['share']['comment_count']):0);
           }

         }
         return $count;
    }
    //  }
    
    return $objCumulative->sfsi_count_cumulative();                 
  }


  public function sfsi_get_uncached_uncumulative_fb($url){   
   
      $url   = trailingslashit($url);
      $count = 0;

      $access_token   = $this->sfsi_get_fb_access_token();

      $json_30_string = $this->file_get_contents_curl('https://graph.facebook.com/v3.0/?id='.$url.'&fields=engagement&access_token='.$access_token);

      if(empty($json_30_string)){
          $json_30_string = $this->file_get_contents_curl('https://graph.facebook.com/?id='.$url);
      }

      $json   = json_decode($json_30_string, true);     

      if(isset($json['engagement'])){

          $count = $json['engagement']['reaction_count'] + $json['engagement']['comment_count']
                +  $json['engagement']['share_count']+ $json['engagement']['comment_plugin_count'];
      }

      else if(isset($json['share'])){
        
        $count  = $json['share']['share_count'] + $json['share']['comment_count'];
      
      }

      return $count;
  }

  /////////////////////////////////////// Fb cached count getters  CLOSES  /////////////////////////////

  /* send curl request   */
  private function file_get_contents_curl($url)
  {
      $ch=curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
      curl_setopt($ch, CURLOPT_FAILONERROR, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $cont = curl_exec($ch);
    
      if(curl_error($ch))
      {
        //die(curl_error($ch));
      }
      return $cont;
  }

}
?>