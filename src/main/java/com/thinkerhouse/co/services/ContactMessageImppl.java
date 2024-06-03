package com.thinkerhouse.co.services;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.thinkerhouse.co.entities.ContactMessage;
import com.thinkerhouse.co.repo.ContactMessageRepository;

@Service
public class ContactMessageImppl implements ContactMessageService {


	@Autowired
	public ContactMessageRepository contactMessageRepository;
	
	@Override
	public List<ContactMessage> getContactMessages() {
		return contactMessageRepository.findAll();
	}

	@Override
	public ContactMessage getContactMessage(Long id) {
		return contactMessageRepository.findById(id).get();
	}

	@Override
	public ContactMessage addContactMessage(ContactMessage contactMessage) {
		return contactMessageRepository.save(contactMessage);
	}

	@Override
	public ContactMessage updateContactMessage(ContactMessage contactMessage) {
		return contactMessageRepository.save(contactMessage);
	}

	@Override
	public void deleteContactMessage(Long id) {
		contactMessageRepository.deleteById(id);
	}

	@Override
	public long countContactMessage() {
		return contactMessageRepository.count();
	}

}
