package com.thinkerhouse.co.services;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.thinkerhouse.co.entities.Users;
import com.thinkerhouse.co.repo.UsersRepo;

@Service
public class UsersServiceImpl implements UserService {

	@Autowired
	public UsersRepo usersRepo;
	
	@Override
	public List<Users> getUsers() {
		return usersRepo.findAll();
	}

	@Override
	public Users addUsers(Users users) {
		return usersRepo.save(users);
	}

	@Override
	public Users updateUsers(Users users) {
		return usersRepo.save(users);
	}

	@Override
	public void deleteUsers(int idUser) {
		usersRepo.deleteById(idUser);
	}

	@Override
	public long countUsers() {
		return usersRepo.count();
	}

	@Override
	public Users findUserById(int idUser) {
		return usersRepo.findById(idUser).get();
	}

	@Override
	public Users findUserByUser(String username) {
		return usersRepo.findByUsername(username);
	}

}
