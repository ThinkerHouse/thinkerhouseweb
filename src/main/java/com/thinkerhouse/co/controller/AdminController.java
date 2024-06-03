package com.thinkerhouse.co.controller;


import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.authentication.AnonymousAuthenticationToken;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

import com.thinkerhouse.co.entities.ContactMessage;
import com.thinkerhouse.co.services.ContactMessageService;

@Controller
//@RequestMapping(produces = MediaType.APPLICATION_JSON_UTF8_VALUE)
public class AdminController {

	@Autowired
	private ContactMessageService contactMessageService;
	
	@GetMapping("/admin")
	public String adminDashboard(Model model) {
		
		long countContactMessage = contactMessageService.countContactMessage();
		model.addAttribute("countContactMessage", countContactMessage);
		
        return "admin/dashboard";
    }
	
	@GetMapping("/login")
	public String login() {
		
		Authentication authentication = SecurityContextHolder.getContext().getAuthentication();
		if (authentication == null || authentication instanceof AnonymousAuthenticationToken) {
			System.out.println("Here I'm One....");
			return "login";
		}
		System.out.println("Here I'm Two....");
		return "redirect:admin/dashboard";
		
	}
	
	@GetMapping("/logout")
	public String logout() {
		return "login";
		
	}
	
	@GetMapping("/admin/dashboard")
	public String dashboard(Model model) {
		long countContactMessage = contactMessageService.countContactMessage();
		model.addAttribute("countContactMessage", countContactMessage);
		
        return "admin/dashboard";
		
	}
	
	@GetMapping("/admin/users")
	public String users() {
		
		return "admin/users";
		
	}
	
	@GetMapping("/admin/messages")
	public String messages(ContactMessage contactMessage, Model model) {
		
		List<ContactMessage> contactMessages = contactMessageService.getContactMessages();
		
		model.addAttribute("contactMessages", contactMessages);
		
		
		return "admin/messages";
		
	}
	
	@GetMapping("/admin/settings")
	public String settings() {
		
		return "admin/settings";
		
	}
}
