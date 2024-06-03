package com.thinkerhouse.co.services;

import java.util.List;

import com.thinkerhouse.co.entities.ContactMessage;

public interface ContactMessageService {

	public List<ContactMessage> getContactMessages();
	
	public ContactMessage getContactMessage(Long id);
	
	public ContactMessage addContactMessage(ContactMessage contactMessage);
	
	public ContactMessage updateContactMessage(ContactMessage contactMessage);
	
	public void deleteContactMessage(Long id);
	
	public long countContactMessage();
	
}
