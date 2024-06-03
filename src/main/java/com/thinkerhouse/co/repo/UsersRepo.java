package com.thinkerhouse.co.repo;

import org.springframework.data.jpa.repository.JpaRepository;

import com.thinkerhouse.co.entities.Users;

public interface UsersRepo extends JpaRepository<Users, Integer> {
	Users findByUsername(String username);
}
