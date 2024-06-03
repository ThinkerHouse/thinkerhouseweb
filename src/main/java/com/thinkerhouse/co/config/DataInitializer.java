package com.thinkerhouse.co.config;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Configuration;
import org.springframework.security.crypto.password.PasswordEncoder;

import com.thinkerhouse.co.entities.Users;
import com.thinkerhouse.co.repo.UsersRepo;

import jakarta.annotation.PostConstruct;

@Configuration
public class DataInitializer {

	@Autowired
	private UsersRepo usersRepo;
	
	@Autowired
	private PasswordEncoder passwordEncoder;

	@PostConstruct
	public void init() {
		if (usersRepo.findByUsername("admin") == null) {
		Users admin = new Users();
		admin.setUsername("admin");
		admin.setPassword(passwordEncoder.encode("password"));
		admin.setEmail("faizshiraji@gmail.com");
		admin.setStatus(true);
		admin.setRoles("ADMIN");
		usersRepo.save(admin);
		} 
	}
}
