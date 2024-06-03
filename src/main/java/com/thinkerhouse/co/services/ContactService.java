package com.thinkerhouse.co.services;


import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.mail.SimpleMailMessage;
import org.springframework.mail.javamail.JavaMailSender;
import org.springframework.stereotype.Service;

import com.thinkerhouse.co.entities.ContactMessage;

import jakarta.mail.MessagingException;

@Service
public class ContactService {
	
	@Autowired
	private ContactMessageService repository;
	
	@Autowired
	private JavaMailSender mailSender;
	
	
	public void saveMessage(ContactMessage message) {
		repository.addContactMessage(message);
	}
		
	public void sendEmail(ContactMessage message) throws MessagingException {
		
		SimpleMailMessage mailMessage = new SimpleMailMessage();
		mailMessage.setFrom(message.getEmail());
		mailMessage.setTo("faiz@thinkerhouse.co");
		mailMessage.setText(message.getMessage());
		mailMessage.setSubject("From Web " + message.getSubject());
		mailSender.send(mailMessage);
	}

}
