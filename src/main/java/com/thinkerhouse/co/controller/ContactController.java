package com.thinkerhouse.co.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

import com.thinkerhouse.co.entities.ContactMessage;
import com.thinkerhouse.co.services.ContactService;

import jakarta.mail.MessagingException;

@Controller
public class ContactController {

	@Autowired
	private ContactService contactService;

	@PostMapping("/contact")
	public String submitContactForm(@RequestParam String name, @RequestParam String email, 
									@RequestParam String subject, @RequestParam String message) throws MessagingException {
		ContactMessage contactMessage = new ContactMessage();
		contactMessage.setName(name);
		contactMessage.setEmail(email);
		contactMessage.setSubject(subject);
		contactMessage.setMessage(message);
		
		contactService.saveMessage(contactMessage);
		contactService.sendEmail(contactMessage);
		return "index";
	}
}
