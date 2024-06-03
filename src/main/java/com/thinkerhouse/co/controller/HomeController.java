package com.thinkerhouse.co.controller;

import org.springframework.http.MediaType;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
@RequestMapping(produces = MediaType.APPLICATION_JSON_UTF8_VALUE)
public class HomeController {

	@GetMapping("/")
	public String index() {
		return "index";
	}
	
	@GetMapping("/soft_dev")
	public String softDev() {
		return "softdev";
	}
	
	@GetMapping("/mobi_dev")
	public String mobiDev() {
		return "mobidev";
	}

	@GetMapping("/security")
	public String security() {
		return "security";
		
	}
	
	@GetMapping("/hrm_sys")
	public String hrmSys() {
		return "hrm_sys";
		
	}
	
	@GetMapping("/hms_sys")
	public String hmsSys() {
		return "hms_sys";
		
	}
	
	@GetMapping("/career")
	public String career() {
		return "career";
		
	}
	
	@GetMapping("/aboutus")
	public String aboutUs() {
		return "aboutus";
		
	}
	
	@GetMapping("/contact")
	public String contactUs() {
		return "contact_us";
		
	}
}
