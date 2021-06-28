package com.oeong.service.impl;

import com.oeong.dao.StudentDao;
import com.oeong.entity.Student;
import com.oeong.service.StudentService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class StudentServiceImpl implements StudentService {

    @Autowired
    private StudentDao studentDao;

    @Override
    public Student findById(Integer id) {
        return studentDao.findById(id);
    }

    @Override
    public List<Student> findByDorm(String dormNum, Integer grade, String department) {
        return studentDao.findByDorm(dormNum, grade, department);
    }
}